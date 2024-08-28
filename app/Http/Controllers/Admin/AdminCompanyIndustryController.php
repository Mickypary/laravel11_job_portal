<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CompanyIndustry;

class AdminCompanyIndustryController extends Controller
{
    public function index()
    {
        $company_industries = CompanyIndustry::all();
        return view('admin.company_industry', compact('company_industries'));
    }

    public function add()
    {
        return view('admin.company_industry_add');
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

        $obj = new CompanyIndustry();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_industry')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $company_industry_single = CompanyIndustry::findorFail($id);
        return view('admin.company_industry_edit', compact('company_industry_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = CompanyIndustry::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_company_industry')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        CompanyIndustry::where('id', $id)->delete();
        return redirect()->route('admin_company_industry')->with('success', 'Data deleted successfully');
    }
}
