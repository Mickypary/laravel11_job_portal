<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CompanyLocation;

class AdminCompanyLocationController extends Controller
{
    public function index()
    {
        $company_locations = CompanyLocation::all();
        return view('admin.company_location', compact('company_locations'));
    }

    public function add()
    {
        return view('admin.company_location_add');
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

        $obj = new CompanyLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_location')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $company_location_single = CompanyLocation::findorFail($id);
        return view('admin.company_location_edit', compact('company_location_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = CompanyLocation::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_company_location')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        CompanyLocation::where('id', $id)->delete();
        return redirect()->route('admin_company_location')->with('success', 'Data deleted successfully');
    }
}
