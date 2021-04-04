<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact screen
     *
     */
    public function show()
    {
      return view('contact');
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

      return "Valid";
    }
}
