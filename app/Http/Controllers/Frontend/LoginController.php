<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Company;
use App\Models\Candidate;

use App\Models\OtherPageItem;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('candidate')->user()->username));
        } elseif (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard')->with('success', 'Hello! ' . ucfirst(Auth::guard('company')->user()->username));
        }

        $other_page = OtherPageItem::where('id', 1)->first();
        return view('frontend.login', compact('other_page'));
    }

    public function company_login_post(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $status = Company::where('username', $request->username)->first()->status;

        if ($status && (Auth::guard('company')->attempt($credentials))) {
            // dd($credentials);
            return redirect()->route('company_dashboard')->with('info', 'Welcome back ');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Email or password');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login')->with('success', ':) Bye. Login again when you are ready');
    }

    public function candidate_login_post(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $status = Candidate::where('username', $request->username)->first()->status;

        if ($status && (Auth::guard('candidate')->attempt($credentials))) {
            return redirect()->route('candidate_dashboard')->with('info', 'Welcome back ');
        } else {
            return redirect()->route('login')->with('error', 'Please verify your account or check email or password');
        }
    }

    public function candidate_logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('login')->with('success', ':) Bye. Login again when you are ready');
    }
}
