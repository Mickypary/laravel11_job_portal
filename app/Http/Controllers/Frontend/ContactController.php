<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

use App\Mail\Websitemail;

use App\Models\ContactPageItem;

class ContactController extends Controller
{
    public function index()
    {
        $contact_page = ContactPageItem::where('id', 1)->first();
        return view('frontend.contact', compact('contact_page'));
    }

    public function store(Request $request)
    {
        $admin_data = Admin::where('id', 1)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $subject = 'New Contact Form Message has been received';
        $message = 'Visitor\'s information<br>';
        $message .= 'Name: ' . $request->name . '<br>';
        $message .= 'Email: ' . $request->email . '<br>';
        $message .= 'Message: ' . $request->message . '<br>';

        Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Email sent. We will get in touch with you soon. Thank you!');
    }
}
