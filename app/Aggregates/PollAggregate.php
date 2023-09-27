<?php

namespace App\Aggregates;

use App\Commands\CreatePoll;
use App\StorableEvents\PollClosed;
use App\StorableEvents\PollCompleted;
use App\StorableEvents\PollCreated;
use App\StorableEvents\VoteSubmitted;
use Carbon\Carbon;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PollAggregate extends AggregateRoot
{
    private array $participants = [];
    private array $voted = [];
    private ?Carbon $expiresAt = null;
    private bool $isClosed = false;

    public function create(CreatePoll $createPollCommand): void
    {
        $this->recordThat(new PollCreated($createPollCommand->getParticipants(), $createPollCommand->getExpiresAt()));
    }

    public function vote(string $voterUuid, string $userUuid): void
    {
        if ($this->isClosed) {
            return;
        }

        if (!is_null($this->expiresAt) && $this->expiresAt->isPast()) {
            return;
        }

        if (!in_array($userUuid, $this->participants)) {
            return;
        }

        $this->recordThat(new VoteSubmitted($voterUuid, $userUuid));

        if (count($this->voted) === count($this->participants)) {
            $this->recordThat(new PollCompleted());
        }
    }

    public function closePoll(): void
    {
        $this->recordThat(new PollClosed());
    }

    public function applyPollCreated(PollCreated $pollCreated): void
    {
        $this->participants = $pollCreated->participants;
        $this->expiresAt = $pollCreated->expiresAt;
    }

    public function applyVoteSubmitted(VoteSubmitted $voteSubmitted)
    {
        $this->voted[] = $voteSubmitted->voterUuid;
    }

    public function applyPollClosed(PollClosed $pollClosed): void
    {
        $this->isClosed = true;
    }
}
