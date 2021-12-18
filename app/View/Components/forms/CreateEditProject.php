<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;
use App\Models\Category;


class CreateEditProject extends Component
{

    private $project;

    public $name;
    public $dateMade;
    public $shortDesc;
    public $longDesc;
    public $categories;
    public $tags;
    public $currentCategoryId;


    public $image;
    public $logo;
    public $gitLink;
    public $webLink;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($project)
    {   
        $this->project=$project;

        //Fill details
        $this->name=$project->name;
        $this->dateMade=$project->date_made;
        $this->shortDesc=$project->short_desc;
        $this->longDesc=$project->long_desc;
        $this->currentCategoryId=$project->category_id;

        //Booleans
        $this->image = basename($this->project->get_image());
        $this->logo = basename($this->project->get_logo());

        $this->gitLink = $this->project->git_link ?? null;
        $this->webLink = $this->project->web_link ?? null;

        //Fetch array of category names
        $this->categories = Category::select('id','name')->get();
        $this->tags = $this->project->tags()->select("id","name","colour","text_colour")->get();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.create-edit-project');
    }
}
