<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\PollStatus;
use Carbon\Carbon;
use Livewire\Component;

class ListPolls extends Component
{
    public function render()
    {
        $polls = Poll::all();

        return view('livewire.list-polls', [
            'activePolls' => $polls->whereIn('status', [PollStatus::CREATED, PollStatus::IN_PROGRESS]),
            'closedPolls' => $polls->whereNotIn('status', [PollStatus::CREATED, PollStatus::IN_PROGRESS])
        ]);
    }
}
