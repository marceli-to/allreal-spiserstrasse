@extends('web.app')
@section('seo_title', __('Ausstattung'))
@section('page_title', __('Ausstattung'))
@section('content')
<x-layout.columns>
  <x-layout.content>
    <x-content.article>
      <x-content.heading-2>Wohnen</x-content.heading-2>
      <p class="mb-16 text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
      <x-content.heading-2>Essen</x-content.heading-2>
      <p class="mb-16 text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
      <x-content.heading-2>Schlafen</x-content.heading-2>
      <p class="mb-16 text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
    </x-content.article>
    </x-layout.content>
</x-layout.columns>
@endsection