<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    public $project;

    public $has_git;
    public $has_web;
    public $is_create;

    public $tag_search;
    public $tag_list = [];

    // Images
    public $uploaded_logo;
    public $is_uploaded_logo_valid;

    public $uploaded_image;
    public $is_uploaded_image_valid;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a project
         */
        return [
            'project.name' => ["required", "string", "min:1", "unique:projects,name,". $this->project->id],
            'project.date_made' => 'required|date',
            'project.active' => 'required|boolean',
            'project.category_id' => 'required|exists:categories,id',
            'project.short_desc' => 'nullable|string',
            'project.long_desc' => 'nullable|string',
            'project.git_link' => 'nullable|url',
            'project.web_link' => 'nullable|url',
            'uploaded_logo' => 'nullable|image|max:1024',
            'uploaded_image' => 'nullable|image|max:2048'
            
        ];
    }

    public function mount(Project $project)
    {
        /**
         * This function is called
         * when the page first loads
         */
        
        $this->project = $project;
        $this->project->date_made = $this->project->getOriginal("date_made");
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
        /**
         * Render the contents of the
         * component
         */
        
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
        /**
         * Called when the user
         * changes a single
         * input / property on the page
         */
        
        $this->validateOnly($propertyName);
    }

    private function updateProjectDetails()
    {
        // Attatch the tags
        $this->project->tags()->sync($this->tag_list);

        // Save the uploaded logo
        if ($this->uploaded_logo){
            $this->project->replaceLogo($this->uploaded_logo);
            $this->uploaded_logo = null;
            $this->is_uploaded_logo_valid = false;
        }

        // Save the uploaded image
        if ($this->uploaded_image){
            $this->project->replaceImage($this->uploaded_image);
            $this->uploaded_image = null;
            $this->is_uploaded_image_valid = false;
        }


        // Save to DB
        $this->project->save(); 
    }

    public function createProject()
    {
        /**
         * Create a new project
         */
        

        $this->authorize('create', Project::class);
        $this->validate();
        // We need to save first so we have a ID
        $this->project->save();
        $this->updateProjectDetails();

        return redirect()->route('projects.show', ["project" => $this->project])->with("success","Project created!");
    }

    public function updateProject()
    {
        /**
         * Update the existing project
         */
        
        $this->authorize('update', $this->project);
        $this->validate();
        $this->updateProjectDetails();
        session()->flash('success', 'Project successfully updated.');
    }

    public function updatedUploadedLogo()
    {
        /**
         * Called when the user
         * uploads a logo for 
         * the project
         */
        $this->is_uploaded_logo_valid = false;
        $this->validateOnly("uploaded_logo");
        $this->is_uploaded_logo_valid = true;
    }



    public function discardUploadedLogo()
    {
        /**
         * Remove reference to the logo
         * the user uploaded so it is
         * not saved
         */
        $this->uploaded_logo = null;
        $this->is_uploaded_logo_valid = false;
    }

    public function resetLogo()
    {
        /**
         * Remove the currently
         * uploaded logo for this project
         * and reset to the placeholder
         */
        $this->project->removeLogo();
        session()->flash('info', 'Logo reset to default');
    }

    public function updatedUploadedImage()
    {
        /**
         * Called when the user
         * uploads a image for 
         * the project
         */
        $this->is_uploaded_image_valid = false;
        $this->validateOnly("uploaded_image");
        $this->is_uploaded_image_valid = true;
    }

    public function discardUploadedImage()
    {
        /**
         * Remove reference to the image
         * the user uploaded so it is
         * not saved
         */
        $this->uploaded_image = null;
        $this->is_uploaded_image_valid = false;
    }

    public function resetImage()
    {
        /**
         * Remove the currently
         * uploaded image for this project
         * and reset to the placeholder
         */
        $this->project->removeImage();
        session()->flash('info', 'Image reset to default');
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


    public function isTagSearchTaken()
    {
        /**
         * Return true if the tag a user
         * searched for exists in the database
         */
        return Tag::where('name', 'Like', '%' . $this->tag_search . '%')->exists();
    }

    public function deleteProject()
    {
        /**
         * Delete this project
         */
        $this->authorize('delete', $this->project);
        $this->project->delete();
        return redirect()->route('projects.index')->with("message","Project deleted");

    }

}
