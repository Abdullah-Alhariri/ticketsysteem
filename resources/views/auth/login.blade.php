@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autofocus/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Wachtwoord')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
{{--        <div class="form-group">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox"--}}
{{--                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

        <x-primary-button>
            {{ __('Log in') }}
        </x-primary-button>
    </form>
@endsection
