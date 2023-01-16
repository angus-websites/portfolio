<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ClientMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

      // Normal validation
      $request->validate([
        'name' => 'required',
        'email' => 'required|email:rfc,dns',
        'message' => 'required'
      ]);


      // Get captcha score
      $secretKey = env('RECAPTCHA_SECRET_KEY', null);
      $response = $request["g-recaptcha-response"];
      $user_ip = $request->ip();
      $reCaptchaValidationUrl = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$user_ip");
      $result = json_decode($reCaptchaValidationUrl, TRUE);

      // Only send email if valid
      if ($result){
        $name=$request->name;
        $email=$request->email;
        $message=$request->message;

        Mail::to("angus@angusgoody.com")->send(new ClientMessage($name,$email,$message));

        return redirect()->back()->with('success', 'Email sent!');

      }else{
        return redirect()->back()->with('error', 'Captcha failed');
      }
      

      
    }
}
