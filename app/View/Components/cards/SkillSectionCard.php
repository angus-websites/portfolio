<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class SkillSectionCard extends Component
{

    private $section;
    public $name;
    public $skills;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($section)
    {
        $this->section=$section;
        $this->name=$section->name;
        $this->skills=$section->skills()->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.skill-section-card');
    }
}
