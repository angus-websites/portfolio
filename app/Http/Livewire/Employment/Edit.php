<?php

namespace App\Http\Livewire\Employment;

use Livewire\Component;
use App\Models\Employment;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
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

    public function saveEmployment()
    {
        /**
         * Called when the user
         * clicks the "Save" button
         */
        
        $validatedData = $this->validate();

        if($this->is_create){
            $this->authorize('create', Employment::class);
        }else{
            $this->authorize('update', $this->employment);
        }

        // Save the uploaded Icon
        if ($this->uploaded_icon){
            $this->employment->replaceIcon($this->uploaded_icon);
            $this->uploaded_icon = null;
            $this->is_uploaded_icon_valid = false;
        }

        // Save the skill
        $this->employment->save();

        if ($this->is_create){
            return redirect()->route('employment.index')->with("success","Employment created!");
        
        }else{
          session()->flash('success', 'Employment successfully updated.');
        }

        
    }

    public function resetIcon()
    {
        /**
         * Reset the icon
         * for this employment
         */
        $this->authorize('update', $this->employment);
        $this->employment->removeIcon();
        session()->flash('info', 'Icon reset to default');
    }

    public function discardUploadedIcon()
    {
        /**
         * Remove reference to the logo
         * the user uploaded so it is
         * not saved
         */
        $this->uploaded_icon = null;
        $this->is_uploaded_icon_valid = false;
    }



    public function render()
    {
        return view('livewire.employment.edit');
    }

    public function mount(Employment $employment)
    {
        $this->employment = $employment;
        $this->is_create = !$employment->exists;
    }

}
