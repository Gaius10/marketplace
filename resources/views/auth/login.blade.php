@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
<-- component ->
<div class="flex flex-col w-full max-w-sm mx-auto p-4 border border-gray-200 bg-white shadow">
	<div class="flex flex-col mb-4">
		<label for="name"
			   class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
			Name
		</label>

		<div class="relative">

			<div class="absolute flex border border-transparent left-0 top-0 h-full w-10">
				<div class="flex items-center justify-center rounded-tl rounded-bl z-10 bg-gray-100 text-gray-600 text-lg h-full w-full">
					<svg viewBox="0 0 24 24"
						 width="24"
						 height="24"
						 stroke="currentColor"
						 stroke-width="2"
						 fill="none"
						 stroke-linecap="round"
						 stroke-linejoin="round"
						 class="h-5 w-5">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12"
								cy="7"
								r="4"></circle>
					</svg>
				</div>
			</div>

			<input id="name"
				   name="name"
				   type="text"
				   placeholder="Name"
				   value=""
				   class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-12">

		</div>
	</div>
	<div class="flex flex-col mb-4">
		<label for="name"
			   class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
			Name
		</label>

		<div class="relative">

			<div class="absolute flex border border-transparent left-0 top-0 h-full w-10">
				<div class="flex items-center justify-center rounded-tl rounded-bl z-10 bg-gray-100 text-gray-600 text-lg h-full w-full">
					<svg viewBox="0 0 24 24"
						 width="24"
						 height="24"
						 stroke="currentColor"
						 stroke-width="2"
						 fill="none"
						 stroke-linecap="round"
						 stroke-linejoin="round"
						 class="h-5 w-5">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12"
								cy="7"
								r="4"></circle>
					</svg>
				</div>
			</div>

			<input id="name"
				   name="name"
				   type="text"
				   placeholder="Name"
				   value=""
				   class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-12 border-red-500">

		</div>

		<span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			Invalid username field !
		</span>
	</div>
</div>

-->