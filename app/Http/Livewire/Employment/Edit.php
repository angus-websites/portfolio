<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public Employment $employment;
    public $is_create = false;

    public $uploaded_icon;
    public $is_uploaded_icon_valid;


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
            'uploaded_icon' => 'nullable|image|max:2048',


        ];
    }

    public function updatedUploadedIcon()
    {
        /**
         * Called when the user
         * uploads a logo for 
         * the project
         */
        $this->is_uploaded_icon_valid = false;
        $this->validateOnly("uploaded_logo");
        $this->is_uploaded_icon_valid = true;
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
