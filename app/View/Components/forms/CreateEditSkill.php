<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CreateEditSkill extends Component
{

    private $skill;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skill)
    {
        $this->skill=$skill;
        $this->name = $skill->name ?? null;
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
