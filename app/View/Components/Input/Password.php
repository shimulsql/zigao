<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Password extends Component
{
    public $label;
    public $name;
    public $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = 'Password Input', $name = 'password', $error = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.password');
    }
}
