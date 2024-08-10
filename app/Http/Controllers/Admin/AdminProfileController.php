<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->new_password != '') {
            $request->validate([
                'new_password' => 'required',
                'retype_password' => 'required|same:new_password',
            ]);

            $admin_data->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists(public_path('uploads/' . $admin_data->photo)) && !empty($admin_data->photo)) {
                unlink(public_path('uploads/' . $admin_data->photo));
            }
            // @unlink(public_path('uploads/' . $admin_data->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'admin' . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $admin_data->photo = $final_name;
        }

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
