<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobType;

class AdminJobTypeController extends Controller
{
    public function index()
    {
        $job_types = JobType::all();
        return view('admin.job_type', compact('job_types'));
    }

    public function add()
    {
        return view('admin.job_type_add');
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

        $obj = new JobType();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_type')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_type_single = JobType::findorFail($id);
        return view('admin.job_type_edit', compact('job_type_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = JobType::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_type')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobType::where('id', $id)->delete();
        return redirect()->route('admin_job_type')->with('success', 'Data deleted successfully');
    }
}
