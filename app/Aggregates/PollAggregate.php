<?php

namespace App\Aggregates;

use App\Commands\CreatePoll;
use App\StorableEvents\PollCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PollAggregate extends AggregateRoot
{
    private array $participants = [];
    private bool $isClosed = false;

    public function create(CreatePoll $createPollCommand)
    {
        $this->recordThat(new PollCreated($createPollCommand->getParticipants(), $createPollCommand->getExpiresAt()));
    }

    public function applyPollCreated(PollCreated $pollCreated)
    {
        $this->participants = $pollCreated->participants;
    }
}
