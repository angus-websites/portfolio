<?php

namespace App\Http\Livewire\Sections;

use Livewire\Component;
use App\Models\SkillSection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
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

        if ($this->is_create){
            $this->authorize('create', SkillSection::class);
            $this->section->save();
            return redirect()->route('skills.index')->with("success","Section created!");
 
        }else{
          $this->authorize('update', SkillSection::class);
          $this->section->save();  
          session()->flash('success', 'Section successfully updated.');
        }
        
    }

    public function deleteSection()
    {
        /**
         * Delete this section
         */
        $this->section->delete();
        return redirect()->route('skills.index')->with("message","Section deleted");
    }
}
