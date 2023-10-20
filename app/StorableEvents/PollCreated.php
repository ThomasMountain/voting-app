<?php

namespace App\StorableEvents;

use Carbon\Carbon;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PollCreated extends ShouldBeStored
{
    public function __construct(public array $participants, public ?Carbon $expiresAt)
    {
    }
}
