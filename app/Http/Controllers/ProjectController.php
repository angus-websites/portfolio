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

  }
