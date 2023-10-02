<?php

namespace App\Livewire;

use App\Aggregates\PollAggregate;
use App\Models\Poll;
use App\Models\User;
use Livewire\Component;

class ShowPoll extends Component
{
    public Poll $poll;
    public $vote;

    public function mount(Poll $poll)
    {
        $this->poll = $poll;
    }

    public function render()
    {
        $this->poll->users = User::query()->whereIn('uuid', $this->poll->participants)->get();
        return view('livewire.show-poll');
    }

    public function saveVote()
    {
        PollAggregate::retrieve($this->poll->uuid)->vote(auth()->user()->uuid, $this->vote)->persist();
    }
}
