<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
    public function termsAndConditions()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.terms', compact('terms'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name'=> ['required','max:50'],
            'email'=> ['required','email'],
            'subject'=> ['required','max:200'],
            'phone'=> ['required','max:50'],
            'message'=> ['required','max:1000'],
        ]);

        $email = 'admin@gmail.com';
        Mail::to($email)->send(new Contact($request->subject, $request->message, $request->email));

        return response(['status'=>'success','message'=>'Mail send successfully!']);
    }
}
