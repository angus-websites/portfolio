<?php

namespace App\Http\Livewire\Tags;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    public Tag $editing_tag;
    public $modal_open = false;
    public $is_create = false;

    protected function rules()
    {
        /**
         * The validation rules
         * for properties
         * of a the tag
         */
        return [
            'editing_tag.name' => ["required", "string", "min:1", "unique:tags,name,". $this->editing_tag->id], 
            'editing_tag.colour' => ["nullable","string"],  
            'editing_tag.text_colour' => ["nullable","string"]        
        ];
    }


    public function render()
    {
        return view('livewire.tags.edit', [
            "tags" => Tag::all(),
        ]);

    }


    public function mount()
    {
        $this->modal_open = false;
        $this->editing_tag = new Tag();
    }

    public function add()
    {
        /**
         * Create a new
         * tag
         */
        $this->is_create = true;
        $this->modal_open=true;
        $this->editing_tag = new Tag();
    }


    public function edit(Tag $tag)
    {
        $this->is_create = false;
        $this->editing_tag = $tag;
        $this->modal_open=true;
    }

    public function saveTag()
    {
        /**
         * Will save the tag details
         * to the database
         */
        
        if ($this->is_create){
            $this->authorize('create', Tag::class);
        }else{
            $this->authorize('update', $this->editing_tag);
        }

        $this->validate();
        $this->editing_tag->save();
        $this->modal_open = false;
    }

    public function delete()
    {
        /**
         * Delete a given tag
         */
        
        $this->authorize('delete', $this->editing_tag);
        $this->editing_tag->delete();
        $this->modal_open = false;
        session()->flash('info', 'Tag deleted');
    }

}
