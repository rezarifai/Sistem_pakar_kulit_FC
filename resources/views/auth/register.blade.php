@extends('layouts.landingpage')

@section('content')
<div class="container mx-auto px-4 py-40">
    <div class="flex justify-center">
        <div class="w-full max-w-xl">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="text-center py-4">
                    <h2 class="text-4xl font-semibold">{{ __('Register') }}</h2>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3">
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nama') }}</label>
                                    <input id="name" type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nomer Telepon') }}</label>
                                    <input id="phone" type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('phone') border-red-500 @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3">
                                <div class="mb-4">
                                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Alamat') }}</label>
                                    <input id="address" type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('address') border-red-500 @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                    @error('address')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Konfirmasi Password') }}</label>
                                    <input id="password-confirm" type="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-center">
                            <button type="submit" class="bg-blue-500 w-full d-block py-2 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
