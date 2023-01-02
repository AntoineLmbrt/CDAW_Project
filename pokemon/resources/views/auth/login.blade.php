@extends('layouts.app')

@section('style')
    <style>
        .pokemon-logo {
            width: 150px;
        }
        .pokemon-logo {
            height: 93px;
        }

        
    </style>
@endsection

@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <img class="pokemon-logo fill-current" src="assets/img/logo/logo.png"/>
                    
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Mot de passe')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Sevenez de Moi!') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('register'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Pas encore de compte?') }}
                        </a>
                    @endif
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __("Mot de passe oublié?") }}
                        </a>
                    @endif

                    <x-button class="ml-4">
                        {{ __('Se Connecter') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

@endsection

