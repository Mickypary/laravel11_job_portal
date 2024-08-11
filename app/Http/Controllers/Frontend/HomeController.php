<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomePageItem;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_data = HomePageItem::where('id', 1)->first();
        $job_categories = JobCategory::orderBy('name', 'asc')->take(9)->get();
        $all_job_categories = JobCategory::orderBy('name', 'asc')->get();
        return view('frontend.home', compact('home_page_data', 'job_categories', 'all_job_categories'));
    }
}
