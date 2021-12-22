<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class HomeController extends Controller
{

    /**
     * Show the home screen
     */
    public function index()
    {
      $skills=Skill::all();
      return view('welcome',["skills" => $skills]);
    }
}
