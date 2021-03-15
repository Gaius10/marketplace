@extends('layouts.front')

@section('content')
<main class="flex flex-row justify-center w-screen px-10 py-10">
    <div class="w-full max-w-4xl">
        <div class="bg-white">
            
            <div class="my-8">
                <div class="container mx-auto px-6">
                    <section class="md:flex md:items-center">
                        <figure class="w-full h-64 md:w-1/2 lg:h-96" title="{{$product->name}}">
                            @if ($product->photos->count())
                                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{asset('storage/' . $product->photos->first()->image)}}" alt="{{$product->name}}">
                            @else
                                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{asset('assets/img/no-photo.jpg')}}" alt="{{$product->name}}">
                            @endif
                        </figure>
                        <article class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                            <h3 class="text-gray-700 uppercase text-lg">{{$product->name}}</h3>
                            <span class="text-gray-500 mt-3">R$ {{number_format($product->price, 2, ',', '.')}}</span>
                            <hr class="my-3">
                            <p class="my-2 text-gray-700">
                                {!! $product->description !!}
                            </p>
                            <div class="flex items-center mt-6">
                                <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Order Now</button>
                                <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <figure class="flex flex-row my-3 items-center">
                                <div class="w-12 mx-2">
                                    <img src="{{asset('storage/' . $product->store->logo)}}" class="object-fill rounded-md" alt="{{$product->store->name}}">
                                </div>
                                <figcaption class="text-gray-600">
                                    {{$product->store->name}}
                                </figcaption>
                            </figure>
                        </article>
                    </section>
                    <section class="mt-5" title="Corpo do produto">
                        <p>{!! $product->body !!}</p>
                    </section>
                    <section class="mt-16" title="Mais produtos">
                        <h3 class="text-gray-600 text-2xl font-medium">Produtos relacionados...</h3>
                        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                            @foreach($recommendations as $product)
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                    @if ($product->photos->count())
                                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{asset('storage/' . $product->photos->first()->image)}}')">
                                    @else
                                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{asset('assets/img/no-photo.jpg')}}')">
                                    @endif
                                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </button>
                                    </div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase">{{$product->name}}</h3>
                                        <span class="text-gray-500 mt-2">R$ {{number_format($product->price, 2, ',', '.')}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection