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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //Validate - ignoring word id on update
        $validated = $request->validate([
        "name" => "required|unique:skills,name,$skill->id",
        ]);

        //Update
        $skill->update($request->all());

        return redirect()->back()->with("success","Skill updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with("success","Skill deleted");
    }
}
