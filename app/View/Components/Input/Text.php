<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $label;
    public $name;
    public $icon;
    public $error;
    public $value;
    public $disabled;
    public $inputClass;

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
        $value = '',
        $disabled = false,
        $inputClass = '',
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->icon = $icon;
        $this->error = $error;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->inputClass = $inputClass;
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
