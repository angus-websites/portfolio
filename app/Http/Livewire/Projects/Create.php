<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;
use App\Models\Project;

class Create extends Component
{

    public $name;
    public $date_made;
    public $category_id;
    public $short_desc;
    public $long_desc;
    public $git_link;
    public $web_link;

    private $has_git;
    private $has_web;

    public $is_create;


    protected $rules = [
        'name' => 'required|string|min:1|unique:projects,name,slug',
        'date_made' => 'required|date',
        'category_id' => 'required|exists:categories,id',
        'short_desc' => 'nullable|string',
        'long_desc' => 'nullable|string',
        'git_link' => 'nullable|url',
        'web_link' => 'nullable|url',
    ];

    public function mount(Project $project, $is_create=true)
    {
        $this->name = $project->name;
        $this->date_made = $project->date_made;
        $this->category_id = $project->category_id;
        $this->short_desc = $project->short_desc;
        $this->long_desc = $project->long_desc;
        $this->git_link = $project->git_link;
        $this->web_link = $project->web_link;
        $this->is_create = $is_create;

        if (!empty($this->git_link)){
            $this->has_git = true;
        }

        if (!empty($this->web_link)){
            $this->has_web = true;
        }

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.projects.create', [
            "categories" => $categories
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createProject()
    {
        /**
         * Create a new project
         */
        
        $validatedData = $this->validate();

        $project = Project::create([
            'name' => $this->name,
            'date_made' => $this->date_made,
            'category_id' => $this->category_id,
            'short_desc' => $this->short_desc,
            'long_desc' => $this->long_desc,
            'git_link' => $this->git_link,
            'web_link' => $this->web_link,

        ]);

        return redirect()->route('projects.show', ["project" => $project])->with("success","Project created!");
    }

    public function hasGitLink()
    {
        return $this->has_git ? 'true' : 'false';
    }

    public function hasWebLink()
    {
        return $this->has_web ? 'true' : 'false';
    }

    public function getButtonText()
    {
        /**
         * Return button text depending
         * on if we're creating or editing
         */
        return $this->is_create ? 'Create' : 'Update';
        
    }

}
