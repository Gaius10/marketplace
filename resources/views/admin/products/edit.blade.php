@extends('layouts.app')

@section('content')
    <div class="md:mt-10 sm:mt-0 flex flex-col items-center">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Produto</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Alterar dados de produto cadastrado
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 md:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do
                                        produto</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        value="{{ $product->name }}"
                                        class="@error('name') border-red-300 @else border-gray-300 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                                    @error('name')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <label for="description" 
                                        class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea id="description" name="description" rows="3"
                                        class="@error('description') border-red-300 @else border-gray-300 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm rounded-md">{{ $product->description }}</textarea>
                                    @error('description')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <label for="body" class="block text-sm font-medium text-gray-700">Corpo do
                                        produto</label>
                                    <textarea id="body" name="body" rows="3"
                                        class="@error('body') border-red-300 @else border-gray-300 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm rounded-md">{{ $product->body }}</textarea>
                                    @error('body')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Preço</label>
                                    <input id="price" name="price" type="text"
                                        value="{{ str_replace('.', ',', $product->price) }}"
                                        class="@error('price') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('price')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="categories"
                                        class="block text-sm font-medium text-gray-700">Categorias</label>
                                    <select id="categories" name="categories[]" type="text" multiple
                                        class="@error('categories') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($product->categories->contains($category)) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <span
                                            class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="photos" class="block text-sm font-medium text-gray-700">Adicionar fotos</label>
                                    <input id="photos" name="photos[]" type="file" value="{{ old('photos') }}" multiple
                                        class="@error('photos.*') border-red-300 @else border-gray-300 @enderror mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('photos.*')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-span-12 md:col-span-3">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <input id="slug" name="slug" autocomplete="slug" type="text"
                                        value="{{ $product->slug }}" disabled
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 my-3">
                    @foreach ($product->photos as $photo)
                        <div class="max-w-xs rounded bg-white overflow-hidden shadow-lg my-2">
                            <img class="w-full" src="{{asset('/storage/' . $photo->image)}}">
                            <div class="px-6 py-2 align-items-right grid grid-cols-1 md:grid-cols-3">
                                <form action="{{route('admin.photo.remove')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="photoName" value="{{$photo->image}}">
                                    <button type="submit" class="col-start-3 focus:outline-none text-red-600 text-sm py-2.5 px-5 rounded-md border hover:border-red-600 hover:bg-red-100">Remover</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
