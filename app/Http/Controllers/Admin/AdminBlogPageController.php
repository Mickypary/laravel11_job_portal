<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BlogPageItem;

class AdminBlogPageController extends Controller
{
    public function index()
    {
        $blog_page_data = BlogPageItem::where('id', 1)->first();
        return view('admin.blog_page', compact('blog_page_data'));
    }

    public function update(Request $request)
    {
        $blog_page_data = BlogPageItem::where('id', 1)->first();
        $request->validate([
            'heading' => 'required',
        ]);


        $blog_page_data->heading = $request->heading;
        $blog_page_data->title = $request->title;
        $blog_page_data->meta_description = $request->meta_description;
        $blog_page_data->update();

        return redirect()->back()->with('success', 'Data updated successfully');
    }
}
