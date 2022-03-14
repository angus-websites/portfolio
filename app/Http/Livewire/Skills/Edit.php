<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;

class Edit extends Component
{

    public Skill $skill;
    public $initial_skill_section_id;

    protected $rules = [
        'skill.name' => 'required|string',
        'skill.description' => 'required|string|max:500',
        'skill.skill_section_id' => 'required|exists:skill_sections,id'
    ];

    public function mount(Skill $skill)
    {
        $this->skill = $skill;
        $this->initial_skill_section_id = $skill->skill_section_id;
    }

    public function render()
    {
        $sections = SkillSection::all();

        return view("livewire.skills.edit", [
            "sections" => $sections,
        ]);
    }

    public function updatedSkillSectionId($value)
    {
        dd($value); // on select change, this line must be dumped
    }
}
