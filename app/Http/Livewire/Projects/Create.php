<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.projects.create', [
            "categories" => $categories
        ]);
    }
}
