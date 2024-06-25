<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('codefamily.update', [$codefamily->id]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="name_family" :value="__('Nome')" />
                            <x-text-input id="name_family" name="name_family" type="text" value="{{ $codefamily->name_family }}" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name_family')" />
                        </div>

                        <div>
                            <x-input-label for="families_code" :value="__('Código da Família')" />
                            <x-text-input id="families_code" name="families_code" type="text" class="mt-1 block w-full" value="{{ $codefamily->families_code }}" maxlength="2" required />
                            <x-input-error class="mt-2" :messages="$errors->get('families_code')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


