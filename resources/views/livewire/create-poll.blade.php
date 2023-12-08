<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Create Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form-section submit="createPoll">
                <x-slot name="title">
                    {{ __('Create Poll') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new Poll.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="participants_search" value="{{ __('Participants') }}" />
                        <x-input id="participants_search" type="search" class="mt-1 block w-full" wire:model="participantsSearch" />
                        <x-input-error for="participants_search" class="mt-2" />

                        <p>{{ $participantsSearch }}</p>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <ul class="divide-y divide-gray-200">
                            @foreach($users as $user)
                                <li>
                                    <label class="w-full py-2 inline-flex items-center">
                                        <x-input type="checkbox" class="rounded" value="{{ $user->uuid }}" wire:model="participants" />
                                        <span class="ml-2">{{ $user->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-button>
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>

        </div>
    </div>
</div>
