<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ClientMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact screen
     *
     */
    public function show()
    {
      return view('contact', ["sitekey" => env('RECAPTCHA_SITE_KEY')]);
    }

    /**
     * Called when user clicks "Send"
     * button on form
     */
    public function send(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required|email:rfc,dns',
        'message' => 'required'
      ]);

      $name=$request->name;
      $email=$request->email;
      $message=$request->message;

      Mail::to("angus@angusgoody.com")->send(new ClientMessage($name,$email,$message));

      return redirect()->back()->with('success', 'Email sent!');
    }
}
