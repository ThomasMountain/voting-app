<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-8 py-12 mx-auto md:px-12 lg:px-32 max-w-7xl lg:py-24">
        <div class="ring-white/10 ring-1 p-2 rounded-3xl bg-gradient-to-t from-white/20 relative">
            <div
                class="flex flex-col bg-card/80 backdrop-blur-2xl rounded-2xl shadow-massive ring-white/10 ring-1 p-8 lg:p-20 relative">
                <div class="lg:text-center max-w-2xl lg:mx-auto">
                    <p
                        class="bg-gradient-to-r from-dark-50 via-dark-300 to-dark-600 bg-clip-text text-transparent text-4xl font-normal font-display tracking-tight pb-2 sm:text-6xl">
                        Cast Your Vote
                    </p>
                    <p class="text-dark-300 mt-4 max-w-xs mx-auto">
                        Find out who was the MVP of your sprint
                    </p>
                </div>
                <div
                    class="p-2 mt-8 transition lg:mx-auto duration-500 ease-in-out transform shadow-big rounded-xl sm:max-w-lg sm:flex">
                    <div class="flex-1 min-w-0 border-dark-700">
                        <a href="{{ route('polls.create') }}"
                            class="flex items-center justify-center h-10 px-4 py-2 text-sm text-white transition-all rounded-lg hover:to-dark-600 bg-gradient-to-b from-dark-300 via-dark-400 to-dark-500">
                            Create Poll
                        </a>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-3">
                        <a href="{{ route('polls.index') }}"
                            class="flex items-center justify-center h-10 px-4 py-2 text-sm text-white transition-all rounded-lg hover:to-dark-600 bg-gradient-to-b from-dark-300 via-dark-400 to-dark-500">
                            Find Poll
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
