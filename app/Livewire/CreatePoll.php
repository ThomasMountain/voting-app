<?php

namespace App\Livewire;

use App\Aggregates\PollAggregate;
use App\Commands\CreatePoll as CreatePollCommand;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class CreatePoll extends Component
{
    public array $participants = [];
    public ?string $participantsSearch;

    public function render()
    {
        return view('livewire.create-poll', ['users' => User::all()]);
    }

    public function createPoll()
    {
        $pollUuid = Str::uuid()->toString();

        $createCommand = new CreatePollCommand($this->participants);
        PollAggregate::retrieve($pollUuid)->create($createCommand)->persist();
    }
}
