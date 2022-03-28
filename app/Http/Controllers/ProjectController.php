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
        // Create a new empty project to pass to our livewire component
        $new_project = new Project();
        return view('projects.create', ["new_project" => $new_project]);
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

        //Validation
        $validated = $request->validate([
          'name' => 'required',
          'short_desc' => 'required',
          'long_desc' => 'required',
          'date_made' => 'date',
          'image' => 'image|max:2048',
          'logo' => 'image|max:2048',
          "git_link"  => "nullable|url",
          "web_link"  => "nullable|url",
        ]);


        //Remove website link if checkbox not checked
        if(!$request->has('has_web')){
            $request->merge([
                'web_link' => null,
            ]);
        }

        //Remove github link if checkbox not checked
        if(!$request->has('has_git')){
            $request->merge([
                'git_link' => null,
            ]);
        }

        //If an image is specified
        if($request->has('imageUpload')){
          //Rename and move to storage
          $imageName = uniqid().'.'.$request->imageUpload->extension();    
          $request->imageUpload->move(public_path('images/projects'), $imageName);
          //Update the image in the project
          $project->img= $imageName;
        }

        //If a logo is specified
        if($request->has('logoUpload')){
          //Rename and move to storage
          $imageName = uniqid().'.'.$request->logoUpload->extension();    
          $request->logoUpload->move(public_path('images/logos'), $imageName);
          //Update the image in the project
          $project->logo= $imageName;
        }



        //Update the project and redirect
        $project->update($request->all());

        //Redirect
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
