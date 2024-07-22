@extends('layouts.landingpage')

@section('content')
    <div class="container mx-auto px-4 py-40">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-lg radius-xl rounded-lg overflow-hidden">
                    <div class=" text-green-700 text-center py-4">
                        <h2 class="text-8xl font-bold">{{ __('Login') }}</h2>
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('email') border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('password') border-red-500 @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between mb-5">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-green-500 hover:underline float-right"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>


                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-green-500 text-white w-full py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
