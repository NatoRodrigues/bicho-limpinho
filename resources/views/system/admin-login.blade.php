@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white text-xl font-semibold py-4 px-6">
                    {{ __('Login') }}
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-input mt-1 block w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Senha') }}</label>
                            <input id="password" type="password" class="form-input mt-1 block w-full @error('password') border-red-500 @enderror" name="password" required>

                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-gray-100 text-center py-4">
                    <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
