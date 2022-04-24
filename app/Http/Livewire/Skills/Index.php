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
    public $delete_modal_open = false;
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
        $this->resetSection();
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

    public function showEdit()
    {
        /**
         * Show the modal for editing
         * this section
         */
        $this->edit_modal_open=true;
        $this->editing_section = $this->active_section;
    }

    public function showDelete()
    {
        $this->delete_modal_open = true;
        $this->editing_section = $this->active_section;
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

    public function resetSection()
    {
        /**
         * Set the active section
         * to the first skill section available
         */
        $this->active_section = SkillSection::firstOrNew();
    }

    public function deleteSection()
    {
        /**
         * Delete the active skill
         * section
         */
        $this->authorize('delete', $this->active_section);
        $this->editing_section->delete();
        $this->delete_modal_open = false;
        $this->resetSection();
        session()->flash('info', 'Section deleted');
        
    }

    public function saveSection()
    {
        /**
         * Save the currently active
         * skill section to the database
         */
        
        if ($this->is_create){
            $this->authorize('create', Skill::class);
            $this->active_section = $this->editing_section;
        }else{
            $this->authorize('update', $this->editing_section);
        }

        $this->validate();
        $this->editing_section->save();
        $this->edit_modal_open = false;
        session()->flash('info', 'Section updated');
    }

}
