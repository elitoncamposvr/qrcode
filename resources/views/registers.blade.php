<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full pb-1.5 inline-flex">
                        <span class="px-2">
                            <x-link-btn :href="route('users.create')">{{ __('Classes') }}</x-link-btn>
                        </span>
                        <span class="px-2">
                            <x-link-btn :href="route('users.create')">{{ __('Família') }}</x-link-btn>
                        </span>
                        <span class="px-2">
                            <x-link-btn :href="route('users.create')">{{ __('Grupo') }}</x-link-btn>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
