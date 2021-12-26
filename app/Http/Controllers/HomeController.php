<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Employment;
use App\Models\Education;

class HomeController extends Controller
{

    /**
     * Show the home screen
     */
    public function index()
    {
      $skills=Skill::all();
      $employment=Employment::all();
      $education=Education::all();
      return view('welcome',["skills" => $skills, "employment" => $employment, "education" => $education]);
    }
}
