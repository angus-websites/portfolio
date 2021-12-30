<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class EducationCard extends Component
{

    private $education;
    public $institute;
    public $level;
    public $start_date;
    public $end_date;
    public $icon;
    public $description;
    public $subjects;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($education)
    {
        $this->education = $education;
        $this->institute = $education->institute;
        $this->level = $education->level;
        $this->start_date = $education->start_date;
        $this->end_date = $education->end_date;
        $this->icon = $education->icon;
        $this->description = $education->description;
        $this->subjects = $education->subjects();
    }

    /**
     * Should this education be a collapse
     * or not? If it includes a description
     * or subjects then yes
     *
     */
    public function isCollapse()
    {
        return (!empty($this->description) || sizeof($this->subjects->get()) > 0);
    }

    /**
     * Does this education instance
     * have subjects associated with it?
     *
     */
    public function hasSubjects()
    {
        return $this->education->hasSubjects();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.education-card');
    }
}
