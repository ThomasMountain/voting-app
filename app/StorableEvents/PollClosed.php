<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PollClosed extends ShouldBeStored
{
    public function __construct()
    {
    }
}
