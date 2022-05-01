<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    public $delete_modal_open = false;
    public Employment $employment_to_delete;

    public function render()
    {
        $employments = Employment::all();

        return view("livewire.employment.index", [
            "employments" => $employments,
        ]);
    }

    public function showDelete(Employment $employment)
    {
        /**
         * Load the delete modal
         * and set the active employment
         * @var boolean
         */
        $this->delete_modal_open = true;
        $this->employment_to_delete = $employment;
    }


    public function deleteEmployment()
    {
        /**
         * Delete the currently
         * active employment
         */
        $this->authorize('delete', $this->employment_to_delete);
        $this->employment_to_delete->delete();
        $this->delete_modal_open = false;
        session()->flash('info', 'Employment deleted');
    }

    public function mount()
    {
        $this->employment_to_delete = Employment::firstOrNew();
    }

}
