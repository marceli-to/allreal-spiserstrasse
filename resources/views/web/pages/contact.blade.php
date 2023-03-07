@extends('web.app')
@section('seo_title', __('Kontakt'))
@section('page_title', __('Kontakt'))
@section('content')
<x-layout.columns>
  <x-layout.content class="max-w-xl">
    <x-content.article>
      <p class="mb-16 text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
      <div id="app-form" class="mt-48"></div>
    </x-content.article>
  </x-layout.content>
</x-layout.columns>
@endsection