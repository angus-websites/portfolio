<?php

namespace App\Http\Livewire\Education;

use Livewire\Component;
use App\Models\Education;

class Index extends Component
{
    public function render()
    {
        $educations = Education::all();

        return view("livewire.education.index", [
            "educations" => $educations,
        ]);
    }
}
