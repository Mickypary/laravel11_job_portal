<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobCategory;

class AdminJobCategoryController extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::all();
        return view('admin.job_category', compact('job_categories'));
    }

    public function add()
    {
        return view('admin.job_category_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        // DB::table('users')->insert([
        //     ['email' => 'jan@example.com', 'name' => 'Jan'],
        //     ['email' => 'anna@example.com', 'name' => 'Anna']
        // ]);

        // $obj = JobCategory::create([
        //     'name' => $request->name,
        // ]);

        $obj = new JobCategory();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->save();

        return redirect()->route('admin_job_category')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_category_single = JobCategory::findorFail($id);
        return view('admin.job_category_edit', compact('job_category_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $obj = JobCategory::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->update();

        return redirect()->route('admin_job_category')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobCategory::where('id', $id)->delete();
        return redirect()->route('admin_job_category')->with('success', 'Data deleted successfully');
    }
}
