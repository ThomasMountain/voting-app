<?php

namespace App\Commands;

use Carbon\Carbon;

class CreatePoll
{
    private array $participants;
    private Carbon|null $expiresAt;

    public function __construct(array $participants, Carbon $expiresAt = null)
    {
        $this->participants = $participants;
        $this->expiresAt = $expiresAt;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getExpiresAt(): Carbon|null
    {
        return $this->expiresAt;
    }

    public function doesExpire(): bool
    {
        return is_null($this->expiresAt);
    }
}
