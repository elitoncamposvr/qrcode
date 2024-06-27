<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full pb-1.5 inline-flex justify-end">
                        <x-link-btn :href="route('codes.create')">{{ __('Novo Código') }}</x-link-btn>
                    </div>

                    <div class="w-full p-2 mb-3 bg-gray-700 rounded-md">
                        <form class="w-full" action="{{ route('codes.search') }}" method="get">
                            <input type="search" name="search" id="search" class="w-full"
                                   placeholder="Busca por código ou projetista">
                        </form>
                    </div>

                    @if(count($code_results) > 0)
                        <div class="w-full inline-flex border-b py-1.5">
                            <div class="w-3/12">
                                Código
                            </div>
                            <div class="w-4/12">
                                Descrição
                            </div>
                            <div class="w-4/12">
                                Projetista
                            </div>
                            <div class="w-1/12 text-center">
                                Ações
                            </div>
                        </div>

                        @foreach($code_results as $code)
                            <div class="w-full inline-flex border-b my-4 dark:border-b-gray-700">
                                <div class="w-3/12">
                                    {{ $code->code }}
                                </div>
                                <div class="w-4/12">
                                    {{ $code->description }}
                                </div>
                                <div class="w-4/12">
                                    {{ $code->designer }}
                                </div>
                                <div class="w-1/12 flex items-center justify-evenly">
                                    <a href="{{ route('codes.show', [$code->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>

                                    </a>
                                    <form method="post" class="form-destroy" action="{{ route('codes.destroy') }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" id="id" value="{{ $code->id }}">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" --}}
                                                 stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-full text-center py-3">
                            Nenhum resultado encontrado.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
