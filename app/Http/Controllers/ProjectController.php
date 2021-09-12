<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;

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
        $categories = Category::all();
        //return view('projects.create', ["project" => $project,"categories"=>$categories]);
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
        $categories = Category::all();
        return view('projects.edit', ["project" => $project,"categories"=>$categories]);
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

        //Convert date to correct format
        $request->merge([
            'date_made' => date("Y-m-d H:i:s",strtotime(str_replace('/', '-', $request->date_made )))
        ]);

        //Update the project and redirect
        $project = Project::where('id', '=', $project->id)->first();
        $project->update($request->all());

        //TODO Update the name and slug
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
