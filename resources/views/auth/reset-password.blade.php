@extends('auth.layout')
@section('content')
<x-form method="POST" action="{{ route('password.update') }}">
  <input type="hidden" name="token" value="{{ request()->route('token') }}" />
  <div class="mb-8">
    <x-logo class="mx-auto h-12 mb-6 w-auto" />
    <h2>{{ __('Change your password') }}</h2>
    <p>{{ __('Set a new password and confirm it, just in case.') }}</p>
  </div>
  @if (session('status'))
    <div class="mb-4 text-sm text-green-600">
        {{ session('status') }}
    </div>
  @endif
  <x-input label="{{ __('E-Mail') }}" type="email" name="email" required />
  <x-input label="{{ __('Password') }}" type="password" name="password" required />
  <x-input label="{{ __('Password confirmation') }}" type="password" name="password_confirmation" required />
  <div class="flex justify-between items-center mt-10">
    <x-button label="{{ __('Update password') }}" type="submit" name="update-password">
      <x-slot name="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>        
      </x-slot>
    </x-button>
  </div>
</x-form>
@endsection