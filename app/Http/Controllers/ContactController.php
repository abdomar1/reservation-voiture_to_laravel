<?php

namespace App\Http\Controllers;
use App\Mail\emailMailable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
// use Illuminate\Support\Facades\Mail;
use Mail;

class ContactController extends Controller
{
    

    public function sendContactEmail(Request $request)
    {
        Mail::to('abdo.alkhyatte5@gmail.com')->send(new emailMailable($request));
        return redirect('contact');
    }
}
