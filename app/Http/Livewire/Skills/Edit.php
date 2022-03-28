<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;

class Edit extends Component
{

    public Skill $skill;


    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a Skill
         */
        return [
            'skill.name' => ["required", "string", "min:1", "unique:skills,name,". $this->skill->id],
            'skill.description' => 'max:500',
            'skill.skill_section_id' => 'required|exists:skill_sections,id'
        ];
    }


    public function mount(Skill $skill)
    {
        $this->skill = $skill;

        // Validate on page load
        $this->validate();
    }

    public function render()
    {
        $sections = SkillSection::all();

        return view("livewire.skills.edit", [
            "sections" => $sections,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function saveSkill()
    {
        /**
         * Called when we want
         * to update our skill
         */
        $validatedData = $this->validate();
        
        // Save model
        $this->skill->save();
        session()->flash('success', 'Skill successfully updated.');
    }

}
