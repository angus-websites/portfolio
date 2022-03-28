<?php

namespace App\Http\Livewire\Sections;

use Livewire\Component;
use App\Models\SkillSection;

class Edit extends Component
{

    public $section;
    public $is_create;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a SkillSection
         */
        return [
            'section.name' => ["required", "string", "min:1", "unique:skill_sections,name,". $this->section->id],
        ];
    }



    public function render()
    {
        return view('livewire.sections.edit');
    }

    public function mount(SkillSection $section)
    {
        $this->section = $section;
        $this->is_create = !$section->exists;

        // Validate on page load
        $this->validate();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveSection()
    {
        /**
         * Called when we want
         * to update our section
         */
        $validatedData = $this->validate();
        
        // Save model
        $this->section->save();

        if ($this->is_create){
           return redirect()->route('skills.index')->with("success","Section created!");
 
        }
        session()->flash('success', 'Section successfully updated.');
    }
}
