<?php

namespace App\View\Components\Front\UI;

use Illuminate\View\Component;

class Popover extends Component
{
    
    public $heading;
    public $id;


    public function __construct($id, $heading = null)
    {
        $this->id = $id;
        $this->heading = $heading;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.ui.popover');
    }
}
