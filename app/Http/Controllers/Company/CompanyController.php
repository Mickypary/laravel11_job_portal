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
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('company.dashboard');
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
}
