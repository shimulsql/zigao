<?php

namespace App\View\Components\Helper;

use Illuminate\View\Component;

class AuthProvider extends Component
{
    private $providers = [
        'google' => [
            'name' => 'Google',
            'icon' => 'fa-brand fa-google',
            'color' => 'bg-google'
        ],
        'facebook' => [
            'name' => 'Facebook',
            'icon' => 'fa-brand fa-facebook',
            'color' => 'bg-facebook'
        ],

    ];

    public $provider;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->provider = $this->providers[$name];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.helper.auth-provider');
    }
}
