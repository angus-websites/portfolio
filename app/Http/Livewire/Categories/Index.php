<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{

    use AuthorizesRequests;
    public $modal_open = false;
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
        $this->modal_open=true;
        $this->editing_category = $category;
        
    }

    public function add()
    {
        /**
         * Create a new
         * category
         */
        $this->modal_open=true;
        $this->editing_category = new Category();
    }

    public function saveCategory()
    {
        /**
         * Save the changes the user
         * makes to their current category
         */
        $this->authorize('update', $this->editing_category);
        $this->validateOnly("editing_category");
        $this->editing_category->save();
        $this->modal_open = false;
    }

}
