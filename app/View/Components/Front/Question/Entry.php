<?php

namespace App\View\Components\Front\Question;

use Illuminate\View\Component;

class Entry extends Component
{
    public $entry;
    public $content = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($entry, $content = '')
    {
        $this->entry = $entry;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.question.entry');
    }
}
