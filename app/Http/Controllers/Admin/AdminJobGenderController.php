<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobGender;

class AdminJobGenderController extends Controller
{
    public function index()
    {
        $job_genders = JobGender::all();
        return view('admin.job_gender', compact('job_genders'));
    }

    public function add()
    {
        return view('admin.job_gender_add');
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

        $obj = new JobGender();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_gender')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_gender_single = JobGender::findorFail($id);
        return view('admin.job_gender_edit', compact('job_gender_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = JobGender::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_gender')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobGender::where('id', $id)->delete();
        return redirect()->route('admin_job_gender')->with('success', 'Data deleted successfully');
    }
}
