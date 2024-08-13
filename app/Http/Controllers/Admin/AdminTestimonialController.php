<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial', compact('testimonials'));
    }

    public function add()
    {
        return view('admin.testimonial_add');
    }

    public function store(Request $request)
    {
        $obj = new Testimonial();

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        // DB::table('users')->insert([
        //     ['email' => 'jan@example.com', 'name' => 'Jan'],
        //     ['email' => 'anna@example.com', 'name' => 'Anna']
        // ]);

        // $obj = JobCategory::create([
        //     'name' => $request->name,
        // ]);

        // Image processing
        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin_testimonial')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $testimonial_single = Testimonial::findorFail($id);
        return view('admin.testimonial_edit', compact('testimonial_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        $obj = Testimonial::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists(public_path('uploads/' . $obj->photo)) && !empty($obj->photo)) {
                unlink(public_path('uploads/' . $obj->photo));
            }

            // Image processing
            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->route('admin_testimonial')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $testimonial_single = Testimonial::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $testimonial_single->photo)) && !empty($testimonial_single->photo)) {
            unlink(public_path('uploads/' . $testimonial_single->photo));
        }

        $testimonial_single->delete();

        return redirect()->route('admin_testimonial')->with('success', 'Data deleted successfully');
    }
}
