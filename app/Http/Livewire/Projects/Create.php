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

    protected $rules = [
        'name' => 'required|string|min:1|unique:projects,name,slug',
        'date_made' => 'required|date',
        'category_id' => 'required|exists:categories,id',
        'short_desc' => 'nullable|string',
        'long_desc' => 'nullable|string',
        'git_link' => 'nullable|url',
        'web_link' => 'nullable|url',
    ];

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

}
