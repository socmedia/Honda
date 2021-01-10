<?php

namespace App\View\Components\Bootstrap;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $icon;

    public $withIcon;

    public $inlineEdit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon = '', $inlineEdit = false, $withIcon = false)
    {
        $this->icon = $icon;
        $this->withIcon = $withIcon;
        $this->inlineEdit = $inlineEdit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.bootstrap.input-group');
    }
}