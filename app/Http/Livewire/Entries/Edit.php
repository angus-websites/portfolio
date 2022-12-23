<?php

namespace App\Http\Livewire\Entries;

use App\Models\Entry;
use Livewire\Component;

class Edit extends Component
{

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a Skill
         */
        return [
            'entry.content' => 'max:5000',
        ];
    }

    public function mount(Entry $entry)
    {
        $this->entry = $entry;
        $this->is_create = !$entry->exists;

        if (!$this->entry->exists){
            $this->entry->entry_id = Entry::firstOrNew()->id;
        }
        // Validate on page load
        $this->validate();
    }

    public function render()
    {
        return view('livewire.entries.edit');
    }

    public function deleteEntry(){
        echo "nah";
    }
}
