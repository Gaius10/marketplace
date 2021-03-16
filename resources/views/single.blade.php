@extends('layouts.front')

@section('content')
<style type="text/css">
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }
</style>

<main class="flex flex-row justify-center w-screen px-10 py-10">
    <div class="w-full max-w-4xl">
        <div class="bg-white">
            
            <div class="my-8">
                <div class="container mx-auto px-6">
                    <section class="md:flex md:items-center">
                        <div class="w-full h-64 md:w-1/2 lg:h-96 grid grid-rows-6 gap-2">
                            <figure title="{{$product->name}}" class="row-span-5">
                                @if ($product->photos->count())
                                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{asset('storage/' . $product->photos->first()->image)}}" alt="{{$product->name}}">
                                @else
                                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{asset('assets/img/no-photo.jpg')}}" alt="{{$product->name}}">
                                @endif
                            </figure>
                            <div class="row-span-1 grid grid-cols-6 gap-1">
                                @foreach($product->photos as $photo)
                                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{asset('storage/' . $photo->image)}}">
                                @endforeach
                            </div>
                        </div>
                        <article class="w-full max-w-lg mx-auto mt-5 grid grid-rows-6 md:ml-8 md:mt-0 md:w-1/2">
                            <div class="row-span-5">
                                <h3 class="text-gray-700 uppercase text-lg">{{$product->name}}</h3>
                                <span class="text-gray-500 mt-3">R$ {{number_format($product->price, 2, ',', '.')}}</span>
                                <hr class="my-3">
                                <p class="my-2 text-gray-700">
                                    {!! $product->description !!}
                                </p>
                                <div class="mt-2">
                                    <label class="text-gray-700 text-sm" for="count">Quantidade:</label>
                                    <div class="flex items-center mt-1">
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" data-action="decrement">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </button>
                                        <span class="text-gray-700 text-lg mx-2" id="text_amount">1</span>
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" data-action="increment">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center mt-6">
                                    <form action="{{route('cart.add')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product[name]"  value="{{$product->name}}">
                                        <input type="hidden" name="product[photo]"  value="{{$product->photos->first()->image}}">
                                        <input type="hidden" name="product[price]" value="{{$product->price}}">
                                        <input type="hidden" name="product[slug]"  value="{{$product->slug}}">
                                        <input type="hidden" name="product[amount]" id="amount" value="1">
                                        <button type="submit"
                                            class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                            Adicionar ao carrinho
                                        </button>
                                    </form>
                                </div>
                                <figure class="flex flex-row my-3 items-center">
                                    <div class="w-12 mx-2">
                                        <img src="{{asset('storage/' . $product->store->logo)}}" class="object-fill rounded-md" alt="{{$product->store->name}}">
                                    </div>
                                    <figcaption class="text-gray-600">
                                        {{$product->store->name}}
                                    </figcaption>
                                </figure>
                            </div>
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

<script>
    function decrement(e) {
        const target = document.getElementById('amount');
        const text = document.getElementById('text_amount');

        let value = Number(target.value);
        value--;
        target.value = value;
        text.innerHTML = value;
    }

    function increment(e) {
        const target = document.getElementById('amount');
        const text = document.getElementById('text_amount');
        
        let value = Number(target.value);
        value++;
        target.value = value;
        text.innerHTML = value;
    }

    const decrementButtons = document.querySelectorAll(`button[data-action="decrement"]`);

    const incrementButtons = document.querySelectorAll(`button[data-action="increment"]`);

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>
@endsection