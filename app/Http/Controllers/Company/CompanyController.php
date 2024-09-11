<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Package;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyIndustry;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\JobGender;
use App\Models\JobSalaryRange;
use App\Models\JobExperience;
use Illuminate\Support\Facades\Hash;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $total_open_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->count();
        $total_featured_jobs = Job::where('is_featured', 1)->where('company_id', Auth::guard('company')->user()->id)->count();
        $jobs = Job::with('rJobCategory')->where('company_id', Auth::guard('company')->user()->id)->orderBy('id', 'desc')->take(2)->get();
        return view('company.dashboard', compact('jobs', 'total_open_jobs', 'total_featured_jobs'));
    }

    public function orders()
    {
        $orders = Order::orderBy('id', 'desc')->with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.orders', compact('orders'));
    }

    public function edit_profile()
    {
        $company_locations = CompanyLocation::orderBy('name', 'asc')->get();
        $company_sizes = CompanySize::get();
        $company_industries = CompanyIndustry::orderBy('name', 'asc')->get();
        return view('company.edit_profile', compact('company_locations', 'company_sizes', 'company_industries'));
    }
    public function update_profile(Request $request)
    {
        $obj = Company::where('id', Auth::guard('company')->user()->id)->first();
        $id = $obj->id;

        $request->validate([
            'company_name' => 'required',
            'contact_person' => 'required',
            'username' => ['required', 'alpha_dash', Rule::unique('companies')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('companies')->ignore($id)],
        ]);


        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists(public_path('uploads/' . $obj->logo)) && !empty($obj->logo)) {
                unlink(public_path('uploads/' . $obj->logo));
            }

            // Image processing
            $ext = $request->file('logo')->extension();
            $final_name = 'company_logo_' . time() . '.' . $ext;
            $request->file('logo')->move(public_path('uploads/'), $final_name);

            $obj->logo = $final_name;
        }

        $obj->company_name = $request->company_name;
        $obj->contact_person = $request->contact_person;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->address = $request->address;
        $obj->company_location_id = $request->company_location_id;
        $obj->company_industry_id = $request->company_industry_id;
        $obj->company_size_id = $request->company_size_id;
        $obj->founded_on = $request->founded_on;
        $obj->website = $request->website;
        $obj->description = $request->description;
        $obj->opening_hour_mon = $request->opening_hour_mon;
        $obj->opening_hour_tue = $request->opening_hour_tue;
        $obj->opening_hour_wed = $request->opening_hour_wed;
        $obj->opening_hour_thu = $request->opening_hour_thu;
        $obj->opening_hour_fri = $request->opening_hour_fri;
        $obj->opening_hour_sat = $request->opening_hour_sat;
        $obj->opening_hour_sun = $request->opening_hour_sun;
        $obj->map_code = $request->map_code;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;
        $obj->update();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function change_password()
    {
        return view('company.change_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $data = [
            'password' => Hash::make($request->password),
        ];

        Company::where('id', Auth::guard('company')->user()->id)->update($data);

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function photos()
    {
        // Check if a person have active package in order table
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        if (!$order_data) {
            return redirect()->back()->with('error', 'You must first buy a package in order to access this page');
        }

        $package_data = Package::where('id', $order_data->package_id)->first();

        if ($package_data->total_allowed_photos == 0) {
            return redirect()->back()->with('error', 'Your current package does not cover photo subscription');
        }


        $photos = CompanyPhoto::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.photos', compact('photos'));
    }

    public function submit_photos(Request $request)
    {
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        $package_data = Package::where('id', $order_data->package_id)->first();

        $existing_photo_count = CompanyPhoto::where('company_id', Auth::guard('company')->user()->id)->count();

        if ($package_data->total_allowed_photos == $existing_photo_count) {
            return redirect()->back()->with('error', 'Maximum number of allowed photos reached. Upgrade your package to upload more photos');
        }

        $obj = new CompanyPhoto();

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Image processing
        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj->photo = $final_name;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo saved successfully');
    }

    public function delete_photos($id)
    {
        $single_data = CompanyPhoto::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $single_data->photo)) && !empty($single_data->photo)) {
            unlink(public_path('uploads/' . $single_data->photo));
        }
        $single_data->delete();

        return redirect()->back()->with('success', 'Photo deleted successfully');
    }


    public function videos()
    {
        // Check if a person have active package in order table
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        if (!$order_data) {
            return redirect()->back()->with('error', 'You must first buy a package in order to access this page');
        }

        $package_data = Package::where('id', $order_data->package_id)->first();

        if ($package_data->total_allowed_photos == 0) {
            return redirect()->back()->with('error', 'Your current package does not cover video subscription');
        }


        $videos = CompanyVideo::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.videos', compact('videos'));
    }


    public function submit_videos(Request $request)
    {
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        $package_data = Package::where('id', $order_data->package_id)->first();

        $existing_video_count = CompanyVideo::where('company_id', Auth::guard('company')->user()->id)->count();

        if ($package_data->total_allowed_videos == $existing_video_count) {
            return redirect()->back()->with('error', 'Maximum number of allowed videos reached. Upgrade your package to upload more vudeos');
        }

        $obj = new CompanyVideo();

        $request->validate([
            'video_url' => 'required',
        ]);

        $obj->video_url = $request->video_url;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success', 'Video saved successfully');
    }


    public function delete_videos($id)
    {
        $single_data = CompanyVideo::where('id', $id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Video deleted successfully');
    }











    public function make_payment()
    {
        $active_plan = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        $packages = Package::all();
        return view('company.make_payment', compact('active_plan', 'packages'));
    }

    public function paypal(Request $request)
    {
        // $request->package_id;

        $single_package_data = Package::where('id', $request->package_id)->first();
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        // dd($response);
        if (isset($response['id']) && $response['id'] !== null) {
            foreach ($response['links'] as $key => $link) {
                if ($link['rel'] === 'approve') {
                    // save data in session before redirection
                    session()->put('package_id', $single_package_data->id);
                    session()->put('package_price', $single_package_data->package_price);
                    session()->put('package_days', $single_package_data->package_days);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }



    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        // dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data['currently_active'] = 0;
            $update_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->update($data);

            // save data into db
            $obj = new Order();
            $obj->company_id = Auth::guard('company')->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method = 'PayPal';
            $obj->start_date = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date = date('Y-m-d', strtotime("+ " . $days .  "days"));
            $obj->currently_active = 1;
            $obj->save();

            // clear session data
            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success', 'Payment successful');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment cancelled. Please try again!');
    }





    // ==================================================================Stripe


    public function stripe(Request $request)
    {
        $single_package_data = Package::where('id', $request->package_id)->first();
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys

        //instantiation way
        // $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        // $stripe->checkout->sessions->create([]);

        //static way
        $stripe = \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

        $response =  \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $single_package_data->package_name
                        ],
                        'unit_amount' => $single_package_data->package_price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company_stripe_success'),
            'cancel_url' => route('company_stripe_cancel'),
        ]);

        session()->put('package_id', $single_package_data->id);
        session()->put('package_price', $single_package_data->package_price);
        session()->put('package_days', $single_package_data->package_days);

        // dd($response);
        return redirect()->away($response->url);
    }

    public function stripe_success(Request $request)
    {
        $data['currently_active'] = 0;
        $update_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->update($data);

        // save data into db
        $obj = new Order();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->package_id = session()->get('package_id');
        $obj->order_no = time();
        $obj->paid_amount = session()->get('package_price');
        $obj->payment_method = 'Stripe';
        $obj->start_date = date('Y-m-d');
        $days = session()->get('package_days');
        $obj->expire_date = date('Y-m-d', strtotime("+ " . $days .  "days"));
        $obj->currently_active = 1;
        $obj->save();

        // clear session data
        session()->forget('package_id');
        session()->forget('package_price');
        session()->forget('package_days');

        return redirect()->route('company_make_payment')->with('success', 'Payment successful');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment cancelled. Please try again!');
    }



    public function create_job()
    {
        // Check if a person have active package in order table
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        if (!$order_data) {
            return redirect()->back()->with('error', 'You must first buy a package in order to access this page');
        }

        $package_data = Package::where('id', $order_data->package_id)->first();

        if ($package_data->total_allowed_jobs == 0) {
            return redirect()->back()->with('error', 'Your current package does not cover job posting');
        }

        $total_job_post = Job::where('company_id', Auth::guard('company')->user()->id)->count();
        if ($package_data->total_allowed_jobs == $total_job_post) {
            return redirect()->back()->with('error', 'Maximum number of allowed jobs reached. Upgrade your package to post more jobs');
        }

        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'asc')->get();
        return view('company.create_job', compact('job_categories', 'job_locations', 'job_types', 'job_experiences', 'job_genders', 'job_salary_ranges'));
    }

    public function create_job_submit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        $package_data = Package::where('id', $order_data->package_id)->first();

        $total_featured_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->where('is_featured', 1)->count();


        if ($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
            if ($request->is_featured) {
                return redirect()->back()->with('error', 'Maximum number of allowed featured jobs reached. Upgrade your package to post more featured jobs');
            }
        }


        $obj = new Job();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->responsibility = $request->responsibility;
        $obj->skill = $request->skill;
        $obj->education = $request->education;
        $obj->benefit = $request->benefit;
        $obj->deadline = $request->deadline;
        $obj->vacancy = $request->vacancy;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_salary_range_id = $request->job_salary_range_id;
        $obj->map_code = $request->map_code;
        $obj->is_featured = $request->is_featured;
        $obj->is_urgent = $request->is_urgent;

        $obj->save();

        return redirect()->back()->with('success', 'Job posted successfully');
    }

    public function jobs()
    {
        $jobs = Job::with('rJobCategory')->where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.jobs', compact('jobs'));
    }

    public function edit_job($id)
    {
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'asc')->get();


        $single_job = Job::where('id', $id)->where('company_id', Auth::guard('company')->user()->id)->first();
        // dd($single_job);
        return view('company.edit_job', compact('single_job', 'job_categories', 'job_locations', 'job_types', 'job_experiences', 'job_genders', 'job_salary_ranges'));
    }

    public function update_job(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        // $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        // $package_data = Package::where('id', $order_data->package_id)->first();

        // $total_featured_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->where('is_featured', 1)->count();


        // if ($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
        //     if ($request->is_featured) {
        //         return redirect()->back()->with('error', 'Maximum number of allowed featured jobs reached. Upgrade your package to post more featured jobs');
        //     }
        // }


        $obj = Job::where('id', $id)->where('company_id', Auth::guard('company')->user()->id)->first();

        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->responsibility = $request->responsibility;
        $obj->skill = $request->skill;
        $obj->education = $request->education;
        $obj->benefit = $request->benefit;
        $obj->deadline = $request->deadline;
        $obj->vacancy = $request->vacancy;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_salary_range_id = $request->job_salary_range_id;
        $obj->map_code = $request->map_code;
        $obj->is_featured = $request->is_featured;
        $obj->is_urgent = $request->is_urgent;

        $obj->update();

        return redirect()->back()->with('success', 'Job updated successfully');
    }

    public function delete_job($id)
    {

        Job::where('id', $id)->delete();

        return redirect()->route('company_jobs')->with('success', 'Job deleted successfully');
    }
}
