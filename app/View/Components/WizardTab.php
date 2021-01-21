<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WizardTab extends Component
{
    public $step;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($step = 1)
    {
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.wizard-tab');
    }
}