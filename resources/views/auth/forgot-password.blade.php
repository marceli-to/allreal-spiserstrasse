@extends('auth.layout')
@section('content')
<x-form method="POST" action="{{ route('password.email') }}">
  <div class="mb-8">
    <x-logo class="mx-auto h-12 mb-6 w-auto" />
    <h2>{{ __('Request a new password') }}</h2>
    <p>{{ __('No worries – simply enter your email and we\'ll send you a link to reset your old password') }}</p>
  </div>
  @if (session('status'))
    <div class="mb-4 text-sm text-green-600">
      {{ session('status') }}
    </div>
  @endif
  <x-input label="{{ __('E-Mail') }}" type="email" name="email" required />
  <div class="flex justify-between items-center mt-10">
    <x-button label="{{ __('Request password') }}" type="submit" name="request-password">
      <x-slot name="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>    
      </x-slot>
    </x-button>
    <a href="{{ route('login') }}" class="helper-link">
      {{ __('Back') }}
    </a>
  </div>

</x-form>
@endsection