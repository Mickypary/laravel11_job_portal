<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\PricingPageItem;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $pricing_page_data = PricingPageItem::where('id', 1)->first();
        return view('frontend.pricing', compact('packages', 'pricing_page_data'));
    }
}
