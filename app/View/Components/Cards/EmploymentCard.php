<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class EmploymentCard extends Component
{
    private $employment;
    public $employer;
    public $start_date;
    public $end_date;
    public $role;
    public $icon;
    public $description;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employment)
    {
        $this->employment = $employment;
        $this->employer = $employment->employer;
        $this->start_date = $employment->startYearHuman();
        $this->end_date = $employment->endYearHuman();
        $this->role = $employment->role;
        $this->icon = $employment->icon;
        $this->description = $employment->description;
    }

    /**
     * Should this employment be a collapse
     * or not? If it includes a description
     * or roles then yes
     *
     */
    public function isCollapse()
    {
        return (!empty($this->description));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.employment-card');
    }
}
