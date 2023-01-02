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

            <div class="mb-4 text-sm text-gray-600">
                
                {{ __("Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.") }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Lien de réinitialisation du password par Email') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
    
@endsection