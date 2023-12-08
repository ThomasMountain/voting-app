<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
                {{ __('Polls') }}
            </h2>
            <a href="{{ route('polls.create') }}">{{ __('Create') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section>
                <h3 class="dark:text-gray-300">Active Polls: {{ $activePolls->count() }} </h3>

                <div class="mt-5 space-y-4">
                    @foreach($activePolls as $activePoll)
                        <livewire:poll-card :poll="$activePoll"/>
                    @endforeach
                </div>
            </section>

            <section class="mt-8">
                <h3 class="dark:text-gray-300">Closed Polls: {{ $closedPolls->count() }} </h3>

                <div class="mt-5 space-y-4">
                    @foreach($closedPolls as $closedPoll)
                        <livewire:poll-card :poll="$closedPoll"/>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</div>
