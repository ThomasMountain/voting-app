<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form wire:submit="saveVote">
                <div class="col-span-6 sm:col-span-4">
                    <ul class="divide-y divide-gray-200">
                        @foreach($poll->users as $user)
                            <li>
                                <label class="w-full py-2 inline-flex items-center">
                                    <x-input type="radio" class="rounded" name="vote" value="{{ $user->uuid }}" wire:model="vote" />
                                    <span class="ml-2 dark:text-gray-300">{{ $user->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <x-action-message class="mr-3" on="saved">
                    {{ __('Voted.') }}
                </x-action-message>

                <x-button type="submit">
                    {{ __('Vote') }}
                </x-button>
            </form>


        </div>
    </div>
</div>
