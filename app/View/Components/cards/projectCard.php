<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class projectCard extends Component
{   

    
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
    public function __construct($title,$description,$category,$link,$imagePath,$imageAlt)
    {
      $this->title = $title;
      $this->description = $description;
      $this->category = $category;
      $this->link = $link;
      $this->imagePath = $imagePath;
      $this->imageAlt = $imageAlt;
      
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
