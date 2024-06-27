<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full flex justify-between mb-3">
                        <div class="w-2/6">
                            <span class="pr-2 font-semibold">Código:</span>
                            {{ $code->code }}
                        </div>
                        <div class="w-4/6">
                            <span class="pr-2 font-semibold">Projetista:</span>
                            {{ $code->designer }}
                        </div>
                    </div>
                    <div class="w-full flex justify-between">
                        <div class="w-2/6">
                            <span class="pr-2 font-semibold">Classe:</span>
                            {{ $code->name_class }}
                        </div>
                        <div class="w-2/6">
                            <span class="pr-2 font-semibold">Família:</span>
                            {{ $code->name_family }}
                        </div>
                        <div class="w-2/6">
                            <span class="pr-2 font-semibold">Grupo:</span>
                            {{ $code->name_group }}
                        </div>
                    </div>
                    <div class="w-full">
                        <span class="pr-2 font-semibold">Descrição:</span>
                        {{ $code->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
