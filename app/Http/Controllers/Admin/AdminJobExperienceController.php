<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobExperience;

class AdminJobExperienceController extends Controller
{
    public function index()
    {
        $job_experiences = JobExperience::all();
        return view('admin.job_experience', compact('job_experiences'));
    }

    public function add()
    {
        return view('admin.job_experience_add');
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

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_experience')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_experience_single = JobExperience::findorFail($id);
        return view('admin.job_experience_edit', compact('job_experience_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = JobExperience::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_experience')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobExperience::where('id', $id)->delete();
        return redirect()->route('admin_job_experience')->with('success', 'Data deleted successfully');
    }
}
