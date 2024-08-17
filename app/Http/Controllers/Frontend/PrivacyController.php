<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PrivacyPageItem;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy_page = PrivacyPageItem::where('id', 1)->first();
        return view('frontend.privacy_policy', compact('privacy_page'));
    }
}
