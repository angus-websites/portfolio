<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;
use App\Models\Project;

class Create extends Component
{
    public $project;

    public $has_git;
    public $has_web;
    public $is_create;

    protected function rules()
    {
        return [
            'project.name' => ["required", "string", "min:1", "unique:projects,name,". $this->project->id],
            'project.date_made' => 'required|date',
            'project.category_id' => 'required|exists:categories,id',
            'project.short_desc' => 'nullable|string',
            'project.long_desc' => 'nullable|string',
            'project.git_link' => 'nullable|url',
            'project.web_link' => 'nullable|url',
        ];
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->is_create = !$project->exists;

        if (!empty($this->project->git_link)){
            $this->has_git = true;
        }

        if (!empty($this->project->web_link)){
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

        $this->project->save();

        return redirect()->route('projects.show', ["project" => $this->project])->with("success","Project created!");
    }

    public function updateProject()
    {
        /**
         * Update the existing project
         */
        $validatedData = $this->validate();

        // Save model
        $this->project->save();

        session()->flash('success', 'Project successfully updated.');
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

    public function getFormRoute()
    {
        /**
         * Get the name of the wire
         * form function to use
         */
        return $this->is_create ? 'createProject' : 'updateProject';  
    }

}
