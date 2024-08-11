<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    public function categories()
    {
        $job_categories =  JobCategory::orderBy('name', 'asc')->get();
        return view('frontend.job_categories', compact('job_categories'));
    }
}
