<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;
use App\Models\FaqPageItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $faq_page = FaqPageItem::where('id', 1)->first();
        return view('frontend.faq', compact('faqs', 'faq_page'));
    }
}
