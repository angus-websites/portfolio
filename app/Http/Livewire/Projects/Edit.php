<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $project;

    public $logo_image;
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
        $this->tag_list = $project->tags()->pluck("id")->toArray();
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

    public function updatedLogoImage()
    {
        $this->validate([
            'logo_image' => 'image|max:1024', // 1MB Max
        ]);
    }


    public function createProject()
    {
        /**
         * Create a new project
         */
        

        $this->validate();
        // We need to save first so we have a ID
        $this->project->save();
        $this->project->tags()->sync($this->tag_list);
        $this->project->save();


        return redirect()->route('projects.show', ["project" => $this->project])->with("success","Project created!");
    }

    public function updateProject()
    {
        /**
         * Update the existing project
         */
        
        $this->validate();

        //Attatch the tags
        $this->project->tags()->sync($this->tag_list);

        // Save to DB
        $this->project->save();

        session()->flash('success', 'Project successfully updated.');
    }

    public function addTag($tag_id)
    {
        /**
         * Store this tag in the list
         * of saved tags
         */
        if(!in_array($tag_id, $this->tag_list)){
            array_push($this->tag_list, $tag_id);
        }
        
    }

    public function removeTag($tag_id)
    {
        /**
         * Remove this tag
         * from the "added" tags
         */
        if (($key = array_search($tag_id, $this->tag_list)) !== false) {
            unset($this->tag_list[$key]);
        }
    }

    public function createTag()
    {
       /**
        * Create a new tag
        * for this project to use
        */

        $this->validate(
            ['tag_search' => 'required|unique:tags,name'],
            [
                'tag_search.required' => 'New tag cannot be empty',
                'tag_search.unique' => 'This tag already exists',
            ],
        );

        // Create the new tag and add it's id to this project
        $tag = Tag::create([
            "name" => $this->tag_search
        ]);

        array_push($this->tag_list, $tag->id);


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

    public function isTagSearchTaken()
    {
        /**
         * Return true if the tag a user
         * searched for exists in the database
         */
        return Tag::where('name', 'Like', '%' . $this->tag_search . '%')->exists();
    }

}
