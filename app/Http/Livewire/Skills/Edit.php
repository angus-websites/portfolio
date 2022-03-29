<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $skill;
    public $is_create;

    // Images
    public $uploaded_icon;
    public $is_uploaded_icon_valid;


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
            'skill.skill_section_id' => 'required|exists:skill_sections,id',
            'uploaded_icon' => 'nullable|image|max:1024',
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


    public function updatedUploadedIcon()
    {
        /**
         * Called when the user
         * uploads a logo for 
         * the project
         */
        $this->is_uploaded_icon_valid = false;
        $this->validateOnly("uploaded_icon");
        $this->is_uploaded_icon_valid = true;
    }

    public function resetIcon()
    {
        /**
         * Reset the skill icon
         * to default
         */
        session()->flash('info', 'Icon reset to default (not really)');
    }

    public function discardUploadedIcon()
    {
        /**
         * Discard the icon
         * the user uploaded
         */
        $this->uploaded_icon = null;
        $this->is_uploaded_icon_valid = false;
    }


}
