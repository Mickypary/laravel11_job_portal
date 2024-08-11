<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomePageItem;

class AdminHomePageController extends Controller
{
    public function index()
    {
        $home_page_data = HomePageItem::where('id', 1)->first();
        return view('admin.home_page', compact('home_page_data'));
    }

    public function update(Request $request)
    {
        $home_page_data = HomePageItem::where('id', 1)->first();
        $request->validate([
            'heading' => 'required',
            'job_title' => 'required',
            'job_category' => 'required',
            'job_location' => 'required',
            'search' => 'required',
            'job_category_heading' => 'required',
            'job_category_status' => 'required',
        ]);

        if ($request->hasFile('background_image')) {
            $request->validate([
                'background_image' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists(public_path('uploads/' . $home_page_data->background_image)) && !empty($home_page_data->background_image)) {
                unlink(public_path('uploads/' . $home_page_data->background_image));
            }
            // @unlink(public_path('uploads/' . $admin_data->photo));

            $ext = $request->file('background_image')->extension();
            $final_name = 'banner_home' . '.' . $ext;

            $request->file('background_image')->move(public_path('uploads/'), $final_name);

            $home_page_data->background_image = $final_name;
        }

        $home_page_data->heading = $request->heading;
        $home_page_data->text = $request->text;
        $home_page_data->job_title = $request->job_title;
        $home_page_data->job_category = $request->job_category;
        $home_page_data->job_location = $request->job_location;
        $home_page_data->search = $request->search;

        $home_page_data->job_category_heading = $request->job_category_heading;
        $home_page_data->job_category_subheading = $request->job_category_subheading;
        $home_page_data->job_category_status = $request->job_category_status;
        $home_page_data->update();

        return redirect()->back()->with('success', 'Data updated successfully');
    }
}
