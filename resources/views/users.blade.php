<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full pb-1.5 inline-flex justify-end">
                        <x-link-btn :href="route('users.create')">{{ __('Novo Usuário') }}</x-link-btn>
                    </div>

                    <div class="w-full inline-flex border-b py-1.5">
                        <div class="w-3/12">
                            Código
                        </div>
                        <div class="w-4/12">
                            Nome
                        </div>
                        <div class="w-4/12">
                            E-mail
                        </div>
                        <div class="w-1/12 text-center">
                            Ações
                        </div>
                    </div>
                    @foreach($users as $user)
                        <div class="w-full inline-flex border-b my-4 dark:border-b-gray-700">
                            <div class="w-3/12">
                                {{ $user->id }}
                            </div>
                            <div class="w-4/12">
                                {{ $user->name }}
                            </div>
                            <div class="w-4/12">
                                {{ $user->email }}
                            </div>
                            <div class="w-1/12 flex items-center justify-evenly">
                                <a href="{{ route('users.edit', [$user->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>
                                </a>
                                <form method="post" class="form-destroy" action="{{ route('users.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

