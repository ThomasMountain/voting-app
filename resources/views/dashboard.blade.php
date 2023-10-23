<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight dark:text-gray-300 text-gray-900">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-8 py-12 mx-auto md:px-12 lg:px-32 max-w-7xl lg:py-24">
        <div class="ring-1 p-2 rounded-3xl relative
                dark:ring-white/10 dark:bg-gradient-to-t dark:from-white/20
                ring-slate/10 bg-gradient-to-t from-slate/10
                ">
            <div
                class="flex flex-col bg-card/80 backdrop-blur-2xl rounded-2xl shadow-massive ring-white/10 ring-1 p-8 lg:p-20 relative">
                <div class="lg:text-center max-w-2xl lg:mx-auto">
                    <p
                        class="bg-gradient-to-r bg-clip-text text-transparent text-4xl font-normal font-display tracking-tight pb-2 sm:text-6xl
                        from-slate-900 via-slate-500 to-slate-600
                        dark:from-slate-50 dark:via-slate-300 dark:to-slate-600
                        ">
                        Cast Your Vote
                    </p>
                    <p class="text-slate-700 dark:text-slate-300 mt-4 max-w-xs mx-auto">
                        Find out who was the MVP of your sprint
                    </p>
                </div>
                <div
                    class="p-2 mt-8 transition lg:mx-auto duration-500 ease-in-out transform shadow-big rounded-xl sm:max-w-lg sm:flex">
                    <div class="flex-1 min-w-0 border-slate-700">
                        <a href="{{ route('polls.create') }}"
                            class="flex items-center justify-center h-10 px-4 py-2 text-sm text-white transition-all rounded-lg hover:to-slate-600
                            bg-gradient-to-b
                            from-slate-900 via-slate-400 to-slate-600
                            dark:from-slate-300 dark:via-slate-400 dark:to-slate-500">
                            Create Poll
                        </a>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-3">
                        <a href="{{ route('polls.index') }}"
                            class="flex items-center justify-center h-10 px-4 py-2 text-sm text-white transition-all rounded-lg hover:to-slate-600 bg-gradient-to-b from-slate-300 via-slate-400 to-slate-500">
                            Find Poll
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
