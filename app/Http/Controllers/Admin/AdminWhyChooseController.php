<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyChooseItem;

class AdminWhyChooseController extends Controller
{
    public function index()
    {
        $why_choose_item = WhyChooseItem::all();
        return view('admin.why_choose', compact('why_choose_item'));
    }

    public function add()
    {
        return view('admin.why_choose_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'text' => 'required',
        ]);

        // DB::table('users')->insert([
        //     ['email' => 'jan@example.com', 'name' => 'Jan'],
        //     ['email' => 'anna@example.com', 'name' => 'Anna']
        // ]);

        // $obj = JobCategory::create([
        //     'name' => $request->name,
        // ]);

        $obj = new WhyChooseItem();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->route('admin_why_choose')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $why_choose_single = WhyChooseItem::findorFail($id);
        return view('admin.why_choose_edit', compact('why_choose_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'text' => 'required',
        ]);

        $obj = WhyChooseItem::where('id', $id)->first();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->update();

        return redirect()->route('admin_why_choose')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        WhyChooseItem::where('id', $id)->delete();
        return redirect()->route('admin_why_choose')->with('success', 'Data deleted successfully');
    }
}
