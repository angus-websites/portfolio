<?php

namespace App\Http\Livewire\Skills;

use Livewire\Component;
use App\Models\SkillSection;
use App\Models\Skill;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    public SkillSection $active_section;
    public SkillSection $editing_section;
    public $edit_modal_open = false;
    public $is_create = false;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a Skill section
         */
        return [
            'editing_section.name' => ["required", "string", "min:1", "unique:skill_sections,name,". $this->active_section->id]
        ];
    }

    public function mount()
    {
        $this->active_section = SkillSection::first();
        $this->editing_section = $this->active_section;
    }

    public function render()
    {
        $sections = SkillSection::all();

        return view("livewire.skills.index", [
            "sections" => $sections,
        ]);
    }

    public function changeSection(SkillSection $section)
    {
        /**
         * Switch tabs to this skill section
         * and load the contents
         */
        $this->active_section = $section;
    }

    public function editSection()
    {
        /**
         * Show the modal for editing
         * this section
         */
        $this->edit_modal_open=true;
    }

    public function add()
    {
        /**
         * Called when user clicks
         * the 'New section'
         */
        $this->is_create = true;
        $this->edit_modal_open=true;
        $this->editing_section = new SkillSection();
        
    }

    public function saveSection()
    {
        /**
         * Save the currently active
         * skill section to the database
         */
        
        if ($this->is_create){
            $this->authorize('create', Skill::class);
        }else{
            $this->authorize('update', $this->editing_section);
        }

        $this->validate();
        $this->editing_section->save();
        $this->edit_modal_open = false;
        session()->flash('info', 'Section updated');
    }

}
