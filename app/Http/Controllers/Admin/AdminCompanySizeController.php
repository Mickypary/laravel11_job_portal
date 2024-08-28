<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CompanySize;

class AdminCompanySizeController extends Controller
{
    public function index()
    {
        $company_sizes = CompanySize::all();
        return view('admin.company_size', compact('company_sizes'));
    }

    public function add()
    {
        return view('admin.company_size_add');
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

        $obj = new CompanySize();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_size')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $company_size_single = CompanySize::findorFail($id);
        return view('admin.company_size_edit', compact('company_size_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = CompanySize::where('id', $id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_company_size')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        CompanySize::where('id', $id)->delete();
        return redirect()->route('admin_company_size')->with('success', 'Data deleted successfully');
    }
}
