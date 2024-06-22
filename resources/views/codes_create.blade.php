<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('codes.store') }}" method="post" class="w-full flex flex-col">
                        @csrf
                   <div class="w-full flex gap-3">
                       <div class="w-2/6">
                           <label for="class_id">Classe</label>
                           <select name="class_id" id="class_id" class="w-full">
                               <option value="0">Escolha sua classe</option>
                               @foreach($code_class as $class)
                                   <option value="{{ $class->id }}">{{ $class->name_class }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="w-2/6">
                           <label for="family_id">Família</label>
                           <select name="family_id" id="family_id" class="w-full">
                               <option value="0">Escolha familia</option>
                               @foreach($code_family as $family)
                                   <option value="{{ $family->id }}">{{ $family->name_family }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="w-2/6">
                           <label for="group_id">Grupo</label>
                           <select name="group_id" id="group_id" class="w-full">
                               <option value="0">Escolha sua família</option>
                               @foreach($code_group as $group)
                                   <option value="{{ $group->id }}">{{ $group->name_group }}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                        <div class="w-full mt-3">
                            <label for="designer">Projetista</label>
                            <input type="text" name="designer" id="designer" value="Eliton Campos" class="w-full">
                        </div>
                        <div class="w-full mt-3">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description"></textarea>
                        </div>
                        <div class="w-full mt-3 flex justify-center">
                            <x-primary-button>{{ __('Cadastrar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
