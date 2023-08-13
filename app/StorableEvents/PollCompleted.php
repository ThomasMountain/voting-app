<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PollCompleted extends ShouldBeStored
{
    public function __construct()
    {
    }
}
