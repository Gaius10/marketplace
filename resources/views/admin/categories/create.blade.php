@extends('layouts.app')

@section('content')
    <div class="md:mt-10 sm:mt-0 flex flex-col items-center">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Criar Categoria</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Registrar nova categoria
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <form action="{{route('admin.categories.store')}}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 md:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da categoria</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name" value="{{old('name')}}"
                                        class="@error('name') border-red-300 @else border-gray-300 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                                    @error('name')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea id="description" name="description" rows="3" class="@error('description') border-red-300 @else border-gray-300 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm rounded-md">{{old('description')}}</textarea>
                                    @error('description')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
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
