<?php

namespace App\Models;

enum PollStatus: string
{
    case CREATED = 'created';

    case IN_PROGRESS = 'in progress';

    case COMPLETED = 'completed';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';

    public function color(): string
    {
        return match($this)
        {
            self::CREATED => 'gray',
            self::IN_PROGRESS => 'blue',
            self::COMPLETED => 'green',
            self::CLOSED, self::CANCELLED => 'red'
        };
    }
}
