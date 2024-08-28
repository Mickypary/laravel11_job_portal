<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobSalaryRange;

class AdminJobSalaryRangeController extends Controller
{
    public function index()
    {
        $job_salary_ranges = JobSalaryRange::all();
        return view('admin.job_salary_range', compact('job_salary_ranges'));
    }

    public function add()
    {
        return view('admin.job_salary_range_add');
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

        $obj = new JobSalaryRange();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_salary_range')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $job_salary_range_single = JobSalaryRange::findorFail($id);
        return view('admin.job_salary_range_edit', compact('job_salary_range_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = JobSalaryRange::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_salary_range')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        JobSalaryRange::where('id', $id)->delete();
        return redirect()->route('admin_job_salary_range')->with('success', 'Data deleted successfully');
    }
}
