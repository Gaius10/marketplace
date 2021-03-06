@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="flex flex-col w-full max-w-sm mx-auto p-4 border border-gray-200 bg-white shadow  mt-10 md:mt-28">
            <header class="mb-2"><h1>Entrar no sistema</h1></header>
            <div class="flex flex-col mb-4">
                <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Email</label>

                <div class="relative">
                    <div class="absolute flex border border-transparent left-0 top-0 h-full w-10">
                        <div class="flex items-center justify-center rounded-tl rounded-bl z-10 bg-gray-100 text-gray-600 text-lg h-full w-full">
                            <i class="far fa-user"></i>
                        </div>
                    </div>

                    <input id="email" name="email" type="text" placeholder="Email"
                        class="@error('email') border-red-500 @enderror text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-12">
                </div>
                @error('email')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Senha</label>

                <div class="relative">
                    <div class="absolute flex border border-transparent left-0 top-0 h-full w-10">
                        <div class="flex items-center justify-center rounded-tl rounded-bl z-10 bg-gray-100 text-gray-600 text-lg h-full w-full">
                            <i class="far fa-key"></i>
                        </div>
                    </div>

                    <input id="password" name="password" type="password" placeholder="Senha"
                        class="@error('password') border-red-500 @enderror text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-12">
                </div>
                @error('password')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex flex-row justify-end">
                <div class="inline-block mr-2 mt-2">
                    <button type="submit" 
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Entrar</button>
                </div>
            </div>
            <div class="flex flex-row justify-end mt-2">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-blue-900">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>
            
        </div>
    </form>
@endsection

