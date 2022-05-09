<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;

class Index extends Component
{
    public Category $current_category;
    public $show_all;

    protected $rules = [
        'current_category' => 'exists:categories,id'
    ];

    public function render()
    {
        $projects=Project::where("active", "1");
        if (!$this->show_all && $this->current_category){
            $projects = $projects->where("category_id", $this->current_category->id);
        }

        $categories = Category::all();
        return view('livewire.projects.index', [
            "projects" => $projects->get(),
            "categories" => $categories]);
    }

    public function mount()
    {
        $this->show_all = 1;
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
