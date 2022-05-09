<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Index extends Component
{
    public function render()
    {
        $projects=Project::where("active", "1")->get();
        return view('livewire.projects.index', ["projects" => $projects]);
    }
}
