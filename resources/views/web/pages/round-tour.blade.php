@extends('web.app')
@section('seo_title', __('360° Rundgang'))
@section('page_title', __('360° Rundgang'))
@section('content')
<x-layout.columns>
  <x-layout.content>
    <figure class="mb-48">
      <img src="https://via.placeholder.com/616x320" alt="360° Rundgang" class="w-full">
    </figure>
    <x-content.article>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
    </x-content.article>
  </x-layout.content>
</x-layout.columns>
@endsection