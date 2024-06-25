<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('codeclass.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name_class" :value="__('Nome')" />
                            <x-text-input id="name_class" name="name_class" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name_class')" />
                        </div>

                        <div>
                            <x-input-label for="class_code" :value="__('Código da Classe')" />
                            <x-text-input id="class_code" name="class_code" type="text" class="mt-1 block w-full" maxlength="1" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('class_code')" />
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


