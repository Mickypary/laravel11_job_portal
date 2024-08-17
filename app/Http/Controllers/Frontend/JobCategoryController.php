<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobCategory;
use App\Models\JobPageCategoryItem;

class JobCategoryController extends Controller
{
    public function categories()
    {
        $job_categories =  JobCategory::orderBy('name', 'asc')->get();
        $job_category_page =  JobPageCategoryItem::where('id', 1)->first();
        return view('frontend.job_categories', compact('job_categories', 'job_category_page'));
    }
}
