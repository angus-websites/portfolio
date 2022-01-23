<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CreateEditSkillSection extends Component
{

    private $section;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($section)
    {
        $this->section=$section;
        $this->name = $section->name ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.create-edit-skill-section');
    }
}
