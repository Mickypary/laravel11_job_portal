<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\Websitemail;

class AdminLoginController extends Controller
{
    public function index()
    {
        // $pass = Hash::make('1234');
        return view('admin.login');
    }

    public function login__(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            // dd($credentials);
            return redirect()->route('admin_dashboard')->with('info', 'Welcome back ' . Auth::guard('admin')->user()->name);
        } else {
            return redirect()->route('admin_login')->with('error', 'Invalid Email or password');
        }
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }
    public function forget_password__(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email address not found');
        }

        $token = hash('sha256', time());

        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Kindly click on this link to reset your password<br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin_login')->with('success', 'Kindly check you mail for a reset link');
    }

    public function reset_password($token, $email)
    {
        $admin_data = Admin::where('token', $token)->where('email', $email)->first();
        if (!$admin_data) {
            return redirect()->route('admin_login')->with('error', 'Invalid token/email');
        }

        return view('admin.reset_password', compact('token', 'email'));
    }

    public function reset_password__(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();
        $admin_data->token = '';
        $admin_data->password = Hash::make($request->password);
        $admin_data->update();


        return redirect()->route('admin_login')->with('success', 'Password updated successfully');
    }



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', ':) Bye. Login again when you are ready');
    }
}
