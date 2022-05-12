<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;

class Index extends Component
{
    public Category $current_category;
    public $sort_by;
    public $show_all;

    protected $rules = [
        'current_category' => 'exists:categories,id',
        'sort_by' => 'in:name,oldest,newest'
    ];

    public function render()
    {
        // Fetch projects
        $projects=Project::where("active", "1");
        $hidden=Project::where("active", "0")->get();
        if (!$this->show_all && $this->current_category){
            $projects = $projects->where("category_id", $this->current_category->id);
        }

        // Retrieve
        $projects = $projects->get();

        // Sort accordingly
        if ($this->sort_by == "name"){
            $projects = $projects->sortByDesc("name");
        }elseif ($this->sort_by == "oldest") {
            $projects = $projects->sortBy("date_made");
        }elseif ($this->sort_by == "newest") {
            $projects = $projects->sortByDesc("date_made");
        }

        $categories = Category::all();
        return view('livewire.projects.index', [
            "projects" => $projects,
            "categories" => $categories,
            "hidden" => $hidden]);
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


    public function mount()
    {
        $this->show_all = 1;
        $this->sort_by = "name";
    }

    public function changeCategory(Category $category)
    {
        $this->current_category = $category;
        $this->show_all=0;
    }

    public function showAll()
    {
        /**
         * Show all the projects
         */
        $this->show_all = 1;
    }

    public function isCategoryActive(Category $category)
    {
        /**
         * Return True or false
         * depending on if this category
         * is the active category or not
         */
        
        if (!$this->show_all){
            return $this->current_category->id == $category->id;
        }
        return false;
    }

}
