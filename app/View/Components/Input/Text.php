<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $label;
    public $name;
    public $icon;
    public $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = 'Text Input',
        $name = 'name',
        $icon = '',
        $error = '',
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->icon = $icon;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.text');
    }
}
