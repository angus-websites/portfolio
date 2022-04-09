<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{

    use AuthorizesRequests;
    public $is_create = false;
    public $modal_open = false;
    public $category_to_delete;
    public Category $editing_category;

    protected function rules()
    {
        /**
         * The validation rules
         * for properties
         * of a the category
         */
        return [
            'editing_category.name' => ["required", "string", "min:1", "unique:categories,name,". $this->editing_category->id], 
            'editing_category.short_name' => ["required", "string", "min:1", "unique:categories,short_name,". $this->editing_category->id],           
        ];
    }

    public function mount()
    {
        $this->modal_open = false;
        $this->editing_category = new Category();
    }

    public function render()
    {
        return view('livewire.categories.index', [
            "categories" => Category::all(),
        ]);
    }

    public function updated($propertyName)
    {
        /**
         * Called when the user
         * changes a single
         * input / property on the page
         */
        
        $this->validateOnly($propertyName);
    }


    public function edit(Category $category)
    {
        /**
         * Edit a single category
         * in the list
         */
        $this->is_create = false;
        $this->editing_category = $category;
        $this->modal_open=true;

    }

    public function add()
    {
        /**
         * Create a new
         * category
         */
        $this->is_create = true;
        $this->modal_open=true;
        $this->editing_category = new Category();
    }

    public function delete()
    {
        /**
         * Delete a given category
         */
        
        $this->authorize('delete', $this->editing_category);
        $this->editing_category->delete();
        $this->modal_open = false;
        session()->flash('info', 'Category deleted');

    }

    public function saveCategory()
    {
        /**
         * Save the changes the user
         * makes to their current category
         */
        
        if ($this->is_create){
            $this->authorize('create', Category::class);
        }else{
            $this->authorize('update', $this->editing_category);
        }

        $this->validate();
        $this->editing_category->save();
        $this->modal_open = false;
    }

}
