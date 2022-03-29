<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;

class Edit extends Component
{

    public $skill;
    public $is_create;


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
        $this->is_create = !$skill->exists;

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
        $this->skill->save();

        if ($this->is_create){
            
            return redirect()->route('skills.index')->with("success","Skill created!");
        
        }else{
          session()->flash('success', 'Skill successfully updated.');
        }

    }

    public function deleteSkill()
    {
        /**
         * Delete this given skill
         */
        $this->skill->delete();
        return redirect()->route('skills.index')->with("message","Skill deleted");
    }

}
