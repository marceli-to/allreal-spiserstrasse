@extends('web.app')
@section('seo_title', __('Projekt'))
@section('page_title', __('Projekt'))
@section('content')
<div class="grid grid-cols-16">
  <div class="col-span-10 lg:col-start-2 lg:col-span-8">
    <figure class="mb-48">
      <img src="https://via.placeholder.com/616x320" alt="Projekt" class="w-full">
    </figure>
    <p class="text-lg">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
  </div>
  <div class="col-start-12 col-span-4 lg:col-start-11 lg:col-span-3">
    <x-list-item>
      <x-link-external url="https://maps.google.com" title="Karte öffnen">
        Google Maps
      </x-link-external>
    </x-list-item>
    <x-list-item>
      <x-link-external url="https://maps.google.com" title="Karte öffnen">
        Webcam Baustelle
      </x-link-external>
    </x-list-item>
  </div>
</div>
@endsection