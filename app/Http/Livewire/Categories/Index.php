<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Index extends Component
{

    public $categories;
    public $selected_category;
    public $modal_open;

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

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->editing_category = $this->categories->first();
        $this->modal_open = false;
    }

    public function render()
    {
        return view('livewire.categories.index');
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
        $this->editing_category = $category;
        
    }

}
