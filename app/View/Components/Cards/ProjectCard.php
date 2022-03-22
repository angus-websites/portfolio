<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;
use App\Models\Project;

class ProjectCard extends Component
{   

    public $project;
    public $title;
    public $description;
    public $link;
    public $imagePath;
    public $imageAlt;
    public $category;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($project)
    {
      $this->project = $project;
      $this->title = $project->name;
      $this->description = $project->short_desc;
      $this->category = "Category";
      $this->link = route("projects.show",["project" => $project]);
      $this->imagePath = $project->getImage();;
      
    }

    public function getAlt(){
      return "Image for ".$this->title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.project-card');
    }


}
