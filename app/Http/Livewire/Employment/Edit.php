<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;

class Edit extends Component
{

    public Employment $employment;

    public function render()
    {
        return view('livewire.employment.edit');
    }

    public function mount(Employment $employment)
    {
        $this->employment = $employment;
    }
}
