<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;

class Edit extends Component
{

    public $project;

    public $has_git;
    public $has_web;
    public $is_create;

    public $tag_search;
    public $tag_list = [];

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
        $tags = Tag::where('name', 'Like', '%' . $this->tag_search . '%')->whereNotIn('id', $this->tag_list)->take(10)->get();
        $added_tags = Tag::findMany($this->tag_list);
        return view('livewire.projects.edit', [
            "categories" => $categories,
            "tags" => $tags,
            "added_tags" => $added_tags,
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

    public function addTag($tag_id){
        /**
         * Store this tag in the list
         * of saved tags
         */
        if(!in_array($tag_id, $this->tag_list)){
            array_push($this->tag_list, $tag_id);
        }
        
    }

    public function removeTag($tag_id){
        /**
         * Remove this tag
         * from the "added" tags
         */
        if (($key = array_search($tag_id, $this->tag_list)) !== false) {
            unset($this->tag_list[$key]);
        }
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
