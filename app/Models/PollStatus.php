<?php

namespace App\Models;

enum PollStatus: string
{
    case CREATED = 'created';

    case IN_PROGRESS = 'in progress';

    case COMPLETED = 'completed';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
}
