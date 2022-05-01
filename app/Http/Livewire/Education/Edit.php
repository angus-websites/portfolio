<?php

namespace App\Http\Livewire\Education;

use Livewire\Component;
use App\Models\Education;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    public Education $education;
    public $is_create = false;

    public $uploaded_icon;
    public $is_uploaded_icon_valid;


    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a education
         */
        return [
            'education.institute' => ["required", "string", "min:1"],
            'education.level' => ["required", "string", "min:1"],
            'education.start_date' => 'required|date',
            'education.end_date' => 'nullable|date',
            'education.description' => 'nullable|string',
            'uploaded_icon' => 'nullable|image|max:2048',


        ];
    }

    public function updatedUploadedIcon()
    {
        /**
         * Called when the user
         * uploads a logo for 
         * the education
         */
        $this->is_uploaded_icon_valid = false;
        $this->validateOnly("uploaded_logo");
        $this->is_uploaded_icon_valid = true;
    }

    public function saveEducation()
    {
        /**
         * Called when the user
         * clicks the "Save" button
         */
        
        $validatedData = $this->validate();

        if($this->is_create){
            $this->authorize('create', Education::class);
        }else{
            $this->authorize('update', $this->education);
        }

        // Save the uploaded Icon
        if ($this->uploaded_icon){
            $this->education->replaceIcon($this->uploaded_icon);
            $this->uploaded_icon = null;
            $this->is_uploaded_icon_valid = false;
        }

        // Save the education
        $this->education->save();

        if ($this->is_create){
            return redirect()->route('education.index')->with("success","Education created!");
        
        }else{
          session()->flash('success', 'Education successfully updated.');
        }

        
    }

    public function resetIcon()
    {
        /**
         * Reset the icon
         * for this employment
         */
        $this->authorize('update', $this->education);
        $this->education->removeIcon();
        session()->flash('info', 'Icon reset to default');
    }



    public function render()
    {
        return view('livewire.education.edit');
    }

    public function mount(Education $education)
    {
        $this->education = $education;
        $this->is_create = !$education->exists;
    }

}
