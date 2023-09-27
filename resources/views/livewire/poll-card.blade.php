@php
    use App\Models\PollStatus;
    $statusColor = match($poll->status) {
        PollStatus::CREATED => 'border-gray-800 bg-gray-300 text-gray-900',
        PollStatus::IN_PROGRESS => 'border-blue-800 bg-blue-300 text-blue-900',
        PollStatus::COMPLETED => 'border-green-800 bg-green-300 text-gray-900',
        PollStatus::CLOSED, PollStatus::CANCELLED => 'border-red-800 bg-redd-300 text-red-900'
    };
@endphp

<div class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 hover:border-gray-300">
    <div class="flex justify-between items-start">
        <a class="space-x-8" href="{{ route('polls.show', ['poll' => $poll->uuid]) }}">
            <span class="absolute inset-0"></span>
            <span class="text-2xl font-semibold">#{{ $poll->id }}</span>
            <span class="text-2xl font-semibold">
                @if($poll->created_at->isCurrentYear())
                    {{ $poll->created_at->format('d M') }}
                @else
                    {{ $poll->created_at->format('d M y') }}
                @endif
            </span>
            <span
                class="px-2 py-1 text-sm rounded-full {{ $statusColor }}">{{ str($poll->status->value)->title() }}</span>
        </a>
        <div>
            <span class="text-xs text-gray-600">{{ $poll->uuid }}</span>
        </div>
    </div>
</div>
