<?php

namespace App\Http\Livewire\Education;

use Livewire\Component;
use App\Models\Education;

class Edit extends Component
{

    public Education $education;

    public function mount(Education $education)
    {
        $this->education = $education;
        
    }
    public function render()
    {
        return view('livewire.education.edit');
    }
}
