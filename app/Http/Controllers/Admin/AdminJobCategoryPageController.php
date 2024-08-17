<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobPageCategoryItem;


class AdminJobCategoryPageController extends Controller
{
    public function index()
    {
        $job_category_page_data = JobPageCategoryItem::where('id', 1)->first();
        return view('admin.job_category_page', compact('job_category_page_data'));
    }

    public function update(Request $request)
    {
        $job_category_page_data = JobPageCategoryItem::where('id', 1)->first();
        $request->validate([
            'heading' => 'required',
        ]);


        $job_category_page_data->heading = $request->heading;
        $job_category_page_data->title = $request->title;
        $job_category_page_data->meta_description = $request->meta_description;
        $job_category_page_data->update();
        return redirect()->back()->with('success', 'Data updated successfully');
    }
}
