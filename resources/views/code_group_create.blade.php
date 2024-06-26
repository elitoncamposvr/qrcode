<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('codegroup.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name_group" :value="__('Nome')" />
                            <x-text-input id="name_group" name="name_group" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name_group')" />
                        </div>

                        <div>
                            <x-input-label for="group_code" :value="__('Código do Grupo')" />
                            <x-text-input id="group_code" name="group_code" type="text" class="mt-1 block w-full" maxlength="2" required />
                            <x-input-error class="mt-2" :messages="$errors->get('group_code')" />
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


