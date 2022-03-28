<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CreateEditSkill extends Component
{

    private $skill;
    public $sections;
    public $currentSection;
    public $name;
    public $description;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skill, $sections)
    {
        $this->skill=$skill;
        $this->sections=$sections;
        $this->currentSection=$skill->skill_section_id;
        $this->name = $skill->name ?? null;
        $this->description = $skill->description ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.create-edit-skill');
    }
}
