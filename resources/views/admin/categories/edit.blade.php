@extends('layouts.app')

@section('content')
    <div class="md:mt-10 sm:mt-0 flex flex-col items-center">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Categoria</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Alterar dados de categoria existente
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 md:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da categoria</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name" value="{{$category->name}}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{$category->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
