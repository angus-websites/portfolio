<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller
{


    public function __construct()
    {
      $this->authorizeResource(Project::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects=Project::all();
      return view('projects.index',["projects" => $projects]);
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

      return view('projects.show', ["project" => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {   
        return view('projects.edit', ["project" => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {   
        //Remove website link if checkbox not checked
        if(!isset($request->has_web)){
            $request->merge([
                'web_link' => null,
            ]);
        }
        //Remove Git link if not specifed
        if(!isset($request->has_git)){
            $request->merge([
                'git_link' => null,
            ]);
        }
        //Update the project and redirect
        $project = Project::where('id', '=', $project->id)->first();
        $project->update($request->all());
        return redirect()->back()->with('success', 'Project updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
  }
