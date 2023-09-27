<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class ShowPoll extends Component
{
    public Poll $poll;

    public function mount(Poll $poll)
    {
        $this->poll = $poll;
    }

    public function render()
    {
        return view('livewire.show-poll');
    }
}
