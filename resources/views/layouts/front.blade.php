<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
</head>
<body x-data="{ cartOpen: false , isOpen: false }" >
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center space-between text-white">
                        <a href="{{route('home')}}">Marketplace Laravel</a>
                    </div>
                    @auth
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="{{route('admin.stores.index')}}"
                                    class="@if (request()->is('admin/stores*')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Lojas</a>
                                <a href="{{route('admin.products.index')}}"
                                    class="@if (request()->is('admin/products*')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Produtos</a>
                                <a href="{{route('admin.categories.index')}}"
                                    class="@if (request()->is('admin/categories*')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Categorias</a>
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="text-white inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @auth
                        <a href="#" onclick="document.querySelector('form.logout').submit();"
                            class="p-5 hover:bg-gray-900 cursor-pointer"> 
                            <span class="hidden md:inline px-1">Sair</span> <i class="fas fa-power-off"></i>
                        </a>

                        <form action="{{route('logout')}}" class="hidden logout" method="POST">@csrf</form>
                    @else
                        <a href="{{route('login')}}" class="p-5 hover:bg-gray-900 cursor-pointer"> 
                            <span class="hidden md:inline px-1">Entrar</span> <i class="fas fa-sign-in-alt"></i>
                        </a>
                        <a href="{{route('register')}}" class="p-5 hover:bg-gray-900 cursor-pointer"> 
                            <span class="hidden md:inline px-1">Registrar</span> <i class="fas fa-user-plus"></i>
                        </a>
                    @endauth
                    <button @click="cartOpen = !cartOpen" class="p-5 hover:bg-gray-900 cursor-pointer focus:outline-none sm:mx-0">
                        <span class="hidden md:inline px-1">Meu Carrinho</span> <i class="far fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                @auth
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{route('admin.stores.index')}}"
                        class="@if (request()->is('admin/stores')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 block rounded-md text-sm font-medium">Lojas</a>
                    <a href="{{route('admin.products.index')}}"
                        class="@if (request()->is('admin/products')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 block rounded-md text-sm font-medium">Produtos</a>
                @endauth
            </div>
        </div>
    </nav>
    <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="z-50 fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Meu carrinho</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        
        @php $cart = session()->get('cart'); @endphp
        @empty($cart)
        
            <p>Nenhum produto por aqui ainda...</p>

        @else
            @foreach ($cart as $p)

                <div class="flex justify-between mt-6 rows-3">
                    <figure class="">
                        <img  alt="{{$p['name']}}" class="h-16 max-w-xs object-cover rounded"
                            src="{{asset('storage/' . @$p['photo'])}}">
                    </figure>
                    <div class="flex flex-col content-start">
                        <div class="">
                            <h3 class="text-sm text-gray-600 font-small-caps font-bold">{{$p['name']}}</h3>
                            <div class="flex items-center mt-2">
                                <span class="text-gray-700 mx-2"></span>
                            </div>
                        </div>
                        <span class="text-gray-600 text-sm">
                            R$ {{number_format($p['price'], 2, ',', '.')}}
                            <i class="fas fa-times"></i>
                            {{$p['amount']}}
                        </span>
                        <span class="text-gray-600 font-bold">R${{number_format($p['price'] * $p['amount'], 2, ',', '.')}}</span>
                    </div>
                    <div class="flex flex-col-reverse">
                        <a href="{{route('cart.remove', ['slug' => $p['slug']])}}" title="Remover produto do carrinho">
                            <i class="text-sm far fa-trash-alt hover:text-red-600"></i>
                        </a>
                    </div>
                </div>
            @endforeach
            <a href="{{route('checkout.index')}}"
                class="cursor-pointer flex items-center justify-center mt-4 px-3 py-2 bg-indigo-600 text-white text-sm uppercase font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                <span>Finalizar compra</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        @endempty($cart)
        
        {{-- <div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button class="ml-3 flex items-center px-3 py-2 bg-indigo-600 text-white text-sm uppercase font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    <span>Apply</span>
                </button>
            </form>
        </div> --}}        
    </div>

    <main class="container">
        @include('flash::message')
        @yield('content')
    </main>
</body>
</html>