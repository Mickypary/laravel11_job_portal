<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\Websitemail;


use App\Models\OtherPageItem;
use App\Models\Company;
use App\Models\Candidate;

class SignupController extends Controller
{
    public function index()
    {
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('candidate')->user()->username));
        } elseif (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('company')->user()->username));
        }

        $other_page = OtherPageItem::where('id', 1)->first();
        return view('frontend.signup', compact('other_page'));
    }

    public function company_signup_store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'contact_person' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->contact_person = $request->contact_person;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verification_link = url('company/verify/' . $token . '/' . $request->email);
        $subject = 'Company Signup Verification Link';
        $message = 'Kindly click on this link to verify your account<br>';
        $message .= '<a href="' . $verification_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));



        return redirect()->route('login')->with('success', 'A mail has been sent to your email address. Click on the verification link to complete your signup process.');
    }

    public function company_verify($token, $email)
    {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if (!$company_data) {
            return redirect()->route('login')->with('error', 'Invalid token/email');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();


        return redirect()->route('login')->with('success', 'Company verification successfully. You can now proceed to login');
    }

    public function candidate_signup_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:candidates',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $obj = new Candidate();
        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verification_link = url('candidate/verify/' . $token . '/' . $request->email);
        $subject = 'Candidate Signup Verification Link';
        $message = 'Kindly click on this link to verify your account<br>';
        $message .= '<a href="' . $verification_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));



        return redirect()->route('login')->with('success', 'A mail has been sent to your email address. Click on the verification link to complete your signup process.');
    }

    public function candidate_verify($token, $email)
    {
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        if (!$candidate_data) {
            return redirect()->route('login')->with('error', 'Invalid token/email');
        }

        $candidate_data->token = '';
        $candidate_data->status = 1;
        $candidate_data->update();


        return redirect()->route('login')->with('success', 'Candidate verification successfully. You can now proceed to login');
    }
}
