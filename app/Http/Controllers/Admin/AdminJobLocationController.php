<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobLocation;

class AdminJobLocationController extends Controller
{
    public function index()
    {
        $job_locations = JobLocation::all();
        return view('admin.job_location', compact('job_locations'));
    }

    public function add()
    {
        return view('admin.job_location_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // DB::table('users')->insert([
        //     ['email' => 'jan@example.com', 'name' => 'Jan'],
        //     ['email' => 'anna@example.com', 'name' => 'Anna']
        // ]);

        // $obj = JobCategory::create([
        //     'name' => $request->name,
        // ]);

        $obj = new JobLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_location')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_location_single = JobLocation::findorFail($id);
        return view('admin.job_location_edit', compact('job_location_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = JobLocation::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_location')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobLocation::where('id', $id)->delete();
        return redirect()->route('admin_job_location')->with('success', 'Data deleted successfully');
    }
}
