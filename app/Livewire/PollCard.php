<?php

namespace App\Livewire;

use Livewire\Component;

class PollCard extends Component
{
    public $poll;

    public function render()
    {
        return view('livewire.poll-card');
    }
}
