<?php

namespace App\Projectors;

use App\Models\Poll;
use App\Models\PollStatus;
use App\StorableEvents\PollCompleted;
use App\StorableEvents\PollCreated;
use App\StorableEvents\VoteSubmitted;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PollsProjector extends Projector
{
    public function onPollCreated(PollCreated $event)
    {
        $poll = new Poll([
            'uuid' => $event->aggregateRootUuid(),
            'participants' => $event->participants,
            'status' => PollStatus::CREATED
        ]);

        $poll->writeable()->save();
    }

    public function onVoteSubmitted(VoteSubmitted $event)
    {
        $poll = Poll::uuid($event->aggregateRootUuid());

        if ($poll->status === PollStatus::CREATED) {
            $poll->status = PollStatus::IN_PROGRESS;
            $poll->writeable()->save();
        }
    }

    public function onPollCompleted(PollCompleted $event)
    {
        $poll = Poll::uuid($event->aggregateRootUuid());
        $poll->status = PollStatus::COMPLETED;
        $poll->writeable()->save();
    }
}
