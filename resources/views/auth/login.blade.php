@extends('auth.layout')
@section('content')
<x-form method="POST" action="{{ route('login') }}">
  <div class="mb-8">
    <x-logo class="mx-auto h-12 mb-6 w-auto" />
    <h2>{{ __('Sign in to your account') }}</h2>
    <p>{{ __('Use the provided email and password') }}</p>
  </div>

  @if ($errors->any())
    <x-notification style="error" class="mb-4 text-sm text-red-600">
      <strong class="block font-bold">{{ __('Es ist ein Fehler aufgetreten.') }}</strong>
      <ul>
        @foreach($errors->all() as $error)
          <li>
            {{ $error}}
          </li>
        @endforeach
      </ul>
    </x-notification>
  @endif

  @if (session('status'))
    <div class="mb-4 text-sm text-green-600">
      {{ session('status') }}
    </div>
  @endif

  <x-input label="{{ __('E-Mail') }}" type="email" name="email" required />
  <x-input label="{{ __('Password') }}" type="password" name="password" required />
  <div class="flex justify-between items-center mt-10">
    <x-button label="{{ __('Login') }}" type="submit" name="login">
      <x-slot name="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
        </svg>
      </x-slot>
    </x-button>
    <a href="{{ route('password.request') }}" class="helper-link">
      {{ __('Forgot password?') }}
    </a>
  </div>
  
</x-form>
@endsection