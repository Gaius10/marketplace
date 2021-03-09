<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center space-between text-white">
                        Marketplace Laravel
                    </div>
                    @auth
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{route('admin.stores.index')}}"
                                    class="@if (request()->is('admin/stores')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Lojas</a>
                                <a href="{{route('admin.products.index')}}"
                                    class="@if (request()->is('admin/products')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Produtos</a>
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="absolute text-white inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
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
    <main class="sm:px-8">
        @include('flash::message')
        @yield('content')
    </main>
</body>

</html>
