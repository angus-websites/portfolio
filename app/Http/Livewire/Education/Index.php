<?php

namespace App\Http\Livewire\Education;

use Livewire\Component;
use App\Models\Education;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    public $delete_modal_open = false;
    public Education $education_to_delete;

    public function render()
    {
        $educations = Education::all();

        return view("livewire.education.index", [
            "educations" => $educations,
        ]);
    }

    public function showDelete(Education $education)
    {
        /**
         * Load the delete modal
         * and set the active education
         * @var boolean
         */
        $this->delete_modal_open = true;
        $this->education_to_delete = $education;
    }


    public function deleteEducation()
    {
        /**
         * Delete the currently
         * active education
         */
        $this->authorize('delete', $this->education_to_delete);
        $this->education_to_delete->delete();
        $this->delete_modal_open = false;
        session()->flash('info', 'Education deleted');
    }

    public function mount()
    {
        $this->education_to_delete = Education::firstOrNew();
    }
}
