@extends('layouts.app')

@section('content')
    <div class="md:mt-10 sm:mt-0 flex flex-col items-center">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Criar Produto</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Registrar novo produto
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 md:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do produto</label>
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

                                <div class="col-span-12 md:col-span-6">
                                    <label for="body" class="block text-sm font-medium text-gray-700">Corpo do produto</label>
                                    <textarea id="body" name="body" rows="3" class="@error('body') border-red-300 @else border-gray-300 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm rounded-md">{{old('body')}}</textarea>
                                    @error('body')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Preço</label>
                                    <input id="price" name="price" type="text" value="{{old('price')}}"
                                        class="@error('price') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('price')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="categories" class="block text-sm font-medium text-gray-700">Categorias</label>
                                    <select id="categories" name="categories[]" type="text" multiple
                                        class="@error('categories') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                    @error('categories')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="photos" class="block text-sm font-medium text-gray-700">Fotos do produto</label>
                                    <input id="photos" name="photos[]" type="file" value="{{old('photos')}}" multiple
                                        class="@error('photos') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('photos')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <input id="slug" name="slug" autocomplete="slug" type="text"
                                        class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
