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

    public $image;
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

        //Booleans
        $this->image = basename($this->project->get_image());
        $this->gitLink = $this->project->git_link ?? null;
        $this->webLink = $this->project->web_link ?? null;

        //Fetch array of category names
        $this->categories = Category::select('id','name')->get();
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
