@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descrição
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="px-6 py-4">
                                        {{ $category->id }}
                                    </td>
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$category->description}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex flex-row">
                                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="text-indigo-600 hover:text-indigo-900 px-3 py-2">Edit</a>
                                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-2">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-end">
                                            <div class="ml-4">
                                                <div class="text-sm">
                                                    {{ $categories->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center w-max mx-auto p-5 border-gray-200">
                    <a href="{{route('admin.categories.create')}}"
                        class="border-2 border-transparent bg-blue-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-blue-500 hover:bg-transparent hover:text-blue-500">Nova Categoria</a>
                </div>
            </div>
        </div>
    </div>
@endsection
