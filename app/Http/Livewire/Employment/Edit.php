<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;

class Edit extends Component
{

    public Employment $employment;
    public $is_create = false;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a employment
         */
        return [
            'employment.employer' => ["required", "string", "min:1"],
            'employment.role' => ["required", "string", "min:1"],
            'employment.start_date' => 'required|date',
            'employment.end_date' => 'nullable|date',
            'employment.description' => 'nullable|string',

        ];
    }


    public function render()
    {
        return view('livewire.employment.edit');
    }

    public function mount(Employment $employment)
    {
        $this->employment = $employment;
    }
}
