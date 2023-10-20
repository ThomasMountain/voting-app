<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PollCancelled extends ShouldBeStored
{
    public function __construct()
    {
    }
}
