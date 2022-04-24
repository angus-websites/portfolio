<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;

class Index extends Component
{
    public function render()
    {
        $employments = Employment::all();

        return view("livewire.employment.index", [
            "employments" => $employments,
        ]);
    }
}
