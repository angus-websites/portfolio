<?php

namespace App\Http\Controllers;

use App\Models\SkillSection;
use Illuminate\Http\Request;

class SkillSectionController extends Controller
{

    public function __construct()
    {
      $this->authorizeResource(SkillSection::class, "section");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = new SkillSection();
        return view('skillsections.create', ["section" => $section]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        "name" => "required|unique:skill_sections,name",
        ]);

        //Create the new section and save
        $section = SkillSection::create($request->all());
        return redirect()->route('section.edit', ['section' => $section])->with("success","Section created");


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
    public function edit(SkillSection $section)
    {
        return view('skillsections.edit',["section" => $section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillSection $section)
    {
        //Validate - ignoring word id on update
        $validated = $request->validate([
        "name" => "required|unique:skill_sections,name,$section->id",
        ]);

        //Update
        $section->update($request->all());

        return redirect()->back()->with("success","Section updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillSection $section)
    {
        $section->delete();
        return redirect()->route('skills.index')->with("success","Section deleted");
    }
}
