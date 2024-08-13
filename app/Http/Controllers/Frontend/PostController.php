<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('frontend.blog', compact('posts'));
    }

    public function detail($slug)
    {
        $single_post = Post::where('slug', $slug)->first();
        $single_post->total_view = $single_post->total_view + 1;
        $single_post->update();
        return view('frontend.blog_detail', compact('single_post'));
    }
}
