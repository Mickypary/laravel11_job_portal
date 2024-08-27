<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\OtherPageItem;
use App\Models\Company;
use App\Models\Candidate;
use App\Mail\Websitemail;

class ForgetPasswordController extends Controller
{
    public function company_forget_password()
    {
        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('company')->user()->username));
        }
        $other_page = OtherPageItem::where('id', 1)->first();
        return view('frontend.company_forget_password', compact('other_page'));
    }

    public function company_forget_password_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $company_data = Company::where('email', $request->email)->first();
        if (!$company_data) {
            return redirect()->back()->with('error', 'Email address not found');
        }

        $token = hash('sha256', time());

        $company_data->token = $token;
        $company_data->update();

        $reset_link = url('company/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Kindly click on this link to reset your password<br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Kindly check you mail for a reset link');
    }

    public function company_reset_password($token, $email)
    {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if (!$company_data) {
            return redirect()->route('login')->with('error', 'Invalid token/email');
        }

        return view('frontend.company_reset_password', compact('token', 'email'));
    }

    public function company_reset_password_post(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $company_data = Company::where('token', $token)->where('email', $email)->first();
        $company_data->token = '';
        $company_data->password = Hash::make($request->password);
        $company_data->update();


        return redirect()->route('login')->with('success', 'Password updated successfully');
    }


    // =========================================================Candidate Methods



    public function candidate_forget_password()
    {
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('candidate')->user()->username));
        }

        $other_page = OtherPageItem::where('id', 1)->first();
        return view('frontend.candidate_forget_password', compact('other_page'));
    }

    public function candidate_forget_password_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $candidate_data = Candidate::where('email', $request->email)->first();
        if (!$candidate_data) {
            return redirect()->back()->with('error', 'Email address not found');
        }

        $token = hash('sha256', time());

        $candidate_data->token = $token;
        $candidate_data->status = 0;
        $candidate_data->update();

        $reset_link = url('candidate/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Kindly click on this link to reset your password<br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Kindly check you mail for a reset link');
    }

    public function candidate_reset_password($token, $email)
    {
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        if (!$candidate_data) {
            return redirect()->route('login')->with('error', 'Invalid token/email');
        }

        return view('frontend.candidate_reset_password', compact('token', 'email'));
    }

    public function candidate_reset_password_post(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        $candidate_data->token = '';
        $candidate_data->password = Hash::make($request->password);
        $candidate_data->status = 1;
        $candidate_data->update();


        return redirect()->route('login')->with('success', 'Password updated successfully');
    }
}
