<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomePageItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_data = HomePageItem::where('id', 1)->first();
        $job_categories = JobCategory::orderBy('name', 'asc')->take(9)->get();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $all_job_categories = JobCategory::orderBy('name', 'asc')->get();
        $all_job_locations = JobLocation::orderBy('name', 'asc')->get();
        $why_choose = WhyChooseItem::get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('frontend.home', compact('home_page_data', 'job_categories', 'all_job_categories', 'why_choose', 'testimonials', 'posts', 'all_job_locations'));
    }
}
