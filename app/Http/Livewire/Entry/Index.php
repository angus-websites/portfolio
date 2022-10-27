<?php

namespace App\Http\Livewire\Entry;

use App\Models\Entry;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $entries = Entry::all();

        return view("livewire.entry.index", [
            "entries" => $entries,
        ]);

    }
}
