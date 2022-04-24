<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;

class Index extends Component
{

    public SkillSection $active_section;

    public function mount()
    {
        $this->active_section = SkillSection::first();
    }

    public function render()
    {
        $sections = SkillSection::all();

        return view("livewire.skills.index", [
            "sections" => $sections,
        ]);
    }

    public function updateCurrent(SkillSection $section)
    {
        $this->active_section = $section;
    }

}
