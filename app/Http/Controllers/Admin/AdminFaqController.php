<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
    }

    public function add()
    {
        return view('admin.faq_add');
    }

    public function store(Request $request)
    {
        $obj = new Faq();

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        // DB::table('users')->insert([
        //     ['email' => 'jan@example.com', 'name' => 'Jan'],
        //     ['email' => 'anna@example.com', 'name' => 'Anna']
        // ]);

        // $obj = JobCategory::create([
        //     'name' => $request->name,
        // ]);


        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->route('admin_faq')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $faq_single = Faq::findorFail($id);
        return view('admin.faq_edit', compact('faq_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $obj = Faq::where('id', $id)->first();

        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->update();

        return redirect()->route('admin_faq')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $faq_single = Faq::where('id', $id)->first();

        $faq_single->delete();

        return redirect()->route('admin_faq')->with('success', 'Data deleted successfully');
    }
}
