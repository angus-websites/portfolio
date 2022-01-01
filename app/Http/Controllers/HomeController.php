<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\SkillSection;
use App\Models\Employment;
use App\Models\Education;

class HomeController extends Controller
{

    /**
     * Show the home screen
     */
    public function index()
    {
      $skillSections = SkillSection::all();
      $employment=Employment::orderBy('start_date')->get();
      $education=Education::orderBy('start_date')->get();
      return view('welcome',["skillSections" => $skillSections, "employment" => $employment, "education" => $education]);
    }
}
