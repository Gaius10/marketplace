@extends('layouts.front')

@section('content')
    <section title="Produtos mais novos" class="flex flex-row justify-center w-screen px-10 py-10">
        <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="w-full max-w-sm overflow-hidden rounded border bg-white shadow">
                    <div class="relative">
                        @if ($product->photos->count())
                        <div class="h-48 bg-cover bg-no-repeat bg-center"
                            style="background-image: url({{asset('storage/' . $product->photos->first()->image)}})">
                        @else
                        <div class="h-48 bg-cover bg-no-repeat bg-center"
                            style="background-image: url({{asset('assets/img/no-photo.jpg')}})">
                        @endif
                        </div>
                        <div style="background-color: rgba(0,0,0,0.6)"
                            class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">R$ {{$product->price}}</div>
                    </div>
                    <div class="p-3">
                        <h3 class="mr-10 text-sm truncate-2nd">
                            <a class="hover:text-blue-500" href="{{route('product.single', ['slug' => $product->slug])}}">{{$product->name}}</a>
                        </h3>
                        <div class="flex items-start justify-between py-1">
                            <p class="text-xs text-gray-500">{{$product->description}}</p>
                            <button class="outline text-xs text-gray-500 hover:text-blue-500" title="Bookmark this ad"><i
                                    class="far fa-bookmark"></i></button>
                        </div>
                        <p class="text-xs text-gray-500">
                            <a href="#" class="hover:underline hover:text-blue-500">{{$product->store->name}}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
