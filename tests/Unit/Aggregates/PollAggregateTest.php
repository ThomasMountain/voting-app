<?php

namespace Tests\Unit\Aggregates;

use App\Aggregates\PollAggregate;
use App\Commands\CreatePoll;
use App\StorableEvents\PollClosed;
use App\StorableEvents\PollCompleted;
use App\StorableEvents\PollCreated;
use App\StorableEvents\VoteSubmitted;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use Spatie\EventSourcing\AggregateRoots\FakeAggregateRoot;

class PollAggregateTest extends TestCase
{
    /** @test */
    public function it_can_create_a_poll()
    {
        $participants = [Str::uuid()->toString()];
        PollAggregate::fake()
            ->given([])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->create(new CreatePoll($participants)))
            ->assertRecorded(new PollCreated($participants, null));
    }

    /** @test */
    public function it_can_register_a_vote()
    {
        $voterUuid = Str::uuid()->toString();
        $userUuid = Str::uuid()->toString();

        PollAggregate::fake()
            ->given([new PollCreated([$userUuid, $voterUuid], null)])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->vote($voterUuid, $userUuid))
            ->assertRecorded(new VoteSubmitted($voterUuid, $userUuid));
    }

    /** @test */
    public function it_does_not_allow_votes_for_users_not_in_the_poll()
    {
        $voterUuid = Str::uuid()->toString();
        $userUuid = Str::uuid()->toString();
        $otherUserUuid = Str::uuid()->toString();

        PollAggregate::fake()
            ->given([new PollCreated([$otherUserUuid], null)])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->vote($voterUuid, $userUuid))
            ->assertNotRecorded(VoteSubmitted::class);
    }

    /** @test */
    public function it_can_close_a_poll()
    {
        PollAggregate::fake()
            ->given([new PollCreated([Str::uuid()], null)])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->closePoll())
            ->assertRecorded(new PollClosed());
    }

    /** @test */
    public function it_closes_the_poll_if_all_participants_have_voted()
    {
        $userOne = Str::uuid()->toString();
        $userTwo = Str::uuid()->toString();

        PollAggregate::fake()
            ->given([new PollCreated([$userOne, $userTwo], null), new VoteSubmitted($userOne, $userTwo)])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->vote($userTwo, $userOne))
            ->assertRecorded([new VoteSubmitted($userTwo, $userOne), new PollCompleted()]);
    }

    /** @test */
    public function it_prevents_votes_cast_after_the_poll_has_expired()
    {
        $now = new Carbon();
        Carbon::setTestNow($now);
        $voterUuid = Str::uuid()->toString();
        $userUuid = Str::uuid()->toString();

        PollAggregate::fake()
            ->given([new PollCreated([$userUuid], $now->copy()->addHour())])
            ->when(function (PollAggregate $pollAggregate) use ($now, $voterUuid, $userUuid) {
                Carbon::setTestNow($now->copy()->addDay());
                $pollAggregate->vote($voterUuid, $userUuid);
            })
            ->assertNotRecorded(VoteSubmitted::class);
    }

    /** @test */
    public function it_prevents_votes_cast_after_the_poll_has_closed()
    {
        $voterUuid = Str::uuid()->toString();
        $userUuid = Str::uuid()->toString();

        PollAggregate::fake()
            ->given([new PollCreated([$userUuid], null), new PollClosed()])
            ->when(fn (PollAggregate $pollAggregate) => $pollAggregate->vote($voterUuid, $userUuid))
            ->assertNotRecorded(VoteSubmitted::class);
    }

    public function getCreatedPollAggregate(array $participants = [], Carbon $expiresAt = null): FakeAggregateRoot
    {
        if (empty($participants)) {
            $participants[] = Str::uuid()->toString();
        }
        return PollAggregate::fake()->given([new PollCreated($participants, $expiresAt)]);
    }
}
