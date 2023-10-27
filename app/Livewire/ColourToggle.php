<?php

namespace App\Livewire;

use Livewire\Component;

class ColourToggle extends Component
{
    protected $colours = [
        'light',
        'dark'
    ];
    public function render()
    {
        return view('livewire.colour-toggle');
    }

    public function toggle()
    {
        auth()->user()->update(
            ['dark_mode' => !auth()->user()->getDarkMode()]
        );

        auth()->user()->refresh();

        $this->js("document.getElementById('html-head').classList.toggle('dark')");
    }

}
