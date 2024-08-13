<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post', compact('posts'));
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        $obj = new Post();

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'short_description' => 'required',
            'description' => 'required',
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
        $final_name = 'post_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj->photo = $final_name;
        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->total_view = 0;
        $obj->save();

        return redirect()->route('admin_post')->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
        // JobCategory::where('id', $id)->first();
        $post_single = Post::findorFail($id);
        return view('admin.post_edit', compact('post_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => ['required', 'alpha_dash', Rule::unique('posts')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required',
        ]);

        $obj = Post::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists(public_path('uploads/' . $obj->photo)) && !empty($obj->photo)) {
                unlink(public_path('uploads/' . $obj->photo));
            }

            // Image processing
            $ext = $request->file('photo')->extension();
            $final_name = 'post_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj->photo = $final_name;
        }

        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->update();

        return redirect()->route('admin_post')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $post_single = Post::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $post_single->photo)) && !empty($post_single->photo)) {
            unlink(public_path('uploads/' . $post_single->photo));
        }

        $post_single->delete();

        return redirect()->route('admin_post')->with('success', 'Data deleted successfully');
    }
}
