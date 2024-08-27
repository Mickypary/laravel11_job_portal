<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Package;

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
