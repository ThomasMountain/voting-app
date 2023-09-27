<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form-section submit="createPoll">
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <ul class="divide-y divide-gray-200">
                            @foreach($poll->participants as $participant)
                                <li>
                                    <label class="w-full py-2 inline-flex items-center">
                                        <x-input type="radio" class="rounded" value="{{ $participant->uuid }}" wire:model="participants" />
                                        <span class="ml-2">{{ $participant->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Voted.') }}
                    </x-action-message>

                    <x-button>
                        {{ __('Vote') }}
                    </x-button>
                </x-slot>
            </x-form-section>

        </div>
    </div>
</div>
