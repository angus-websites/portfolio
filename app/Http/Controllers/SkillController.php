<?php

namespace App\Http\Controllers;

use App\Models\SkillSection;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function __construct()
    {
      $this->authorizeResource(Skill::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show the index skill page
        $skillSections = SkillSection::all();
        return view('skills.index',["sections" => $skillSections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = new Skill();
        return view('skills.create',["skill" => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit',["skill" => $skill]);
    }

}
