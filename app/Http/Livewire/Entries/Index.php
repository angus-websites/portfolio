<?php

namespace App\Http\Livewire\Entries;

use App\Models\Entry;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $entries = Entry::all();

        return view("livewire.entries.index", [
            "entries" => $entries,
        ]);

    }

    public function showDelete()
    {
        echo "hi";
    }

    public function add()
    {
        echo "added";
    }
}
