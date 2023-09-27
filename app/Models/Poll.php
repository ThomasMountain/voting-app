<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EventSourcing\Projections\Projection;

class Poll extends Projection
{
    protected $guarded = [];

    protected $casts = [
        'status' => PollStatus::class,
    ];

    public static function uuid(string $uuid): ?Poll
    {
        return static::where('uuid', $uuid)->first();
    }
}
