@extends('layouts.front')

@section('content')

<form action="#">
    <div class="flex flex-col items-center w-screen mt-3 py-5 px-5">
        <header class="flex-header">
            <h1 class="text-xl font-bold font-small-caps my-2">Dados para pagamento</h1>
        </header>
        <div class="w-full md:w-1/2 lg:w-1/3 grid grid-cols-1 my-1">
            <div>
                <label for="card_number">Número do cartão</label>
                <div class="relative card_input">
                    <input type="text" name="card_number" id="card_number" placeholder="Número do cartão"
                        class="w-full placeholder-gray-400 border rounded py-2 pr-2 pl-10">

                    <div class="flex flex-row items-center justify-center absolute left-0 top-0 w-10 h-full">
                        <i class="far fa-credit-card text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 grid grid-cols-1 md:grid-cols-2 gap-2 my-1">
            <div>
                <label for="card_month">Mês de expiração</label>
                <div class="relative card_input">
                    <input type="text" name="card_month" id="card_month" placeholder="Mês de expiração"
                        class="w-full placeholder-gray-400 border rounded py-2 pr-2 pl-10">

                    <div class="flex flex-row items-center justify-center absolute left-0 top-0 w-10 h-full text-xl">
                        <i class="far fa-calendar-week"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="card_year">Ano de expiração</label>
                <div class="relative card_input">
                    <input type="text" name="card_year" id="card_year" placeholder="Ano de expiração"
                        class="w-full placeholder-gray-400 border rounded py-2 pr-2 pl-10">

                    <div class="flex flex-row items-center justify-center absolute left-0 top-0 w-10 h-full">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 grid grid-cols-1 my-1">
            <div>
                <label for="card_cvv">Código de segurança</label>
                <div class="relative card_input">
                    <input type="text" name="card_cvv" id="card_cvv" placeholder="CVV"
                        class="w-full placeholder-gray-400 border rounded py-2 pr-2 pl-10">

                    <div class="flex flex-row items-center justify-center absolute left-0 top-0 w-10 h-full">
                        <i class="far fa-shield-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
            class="cursor-pointer flex items-center justify-center mt-4 px-4 py-3 bg-indigo-600 text-white text-sm uppercase font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
            Efetuar compra

            <span class="ml-3">
                <i class="fas fa-long-arrow-alt-right"></i>
            </span>
        </button>
    </div>
</form>

@endsection