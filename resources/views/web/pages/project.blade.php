@extends('web.app')
@section('seo_title', __('Projekt'))
@section('page_title', __('Projekt'))
@section('content')
<x-content.lightbox>
  <figure>
    <img 
      src="/media/Allreal-Spiserstrasse-Umgebung.svg" 
      width="1190" 
      height="795" 
      alt="Umgebungsplan Allreal Spiserstrasse" class="w-full bg-white">
  </figure>
</x-content.lightbox>
<x-layout.columns>
  <x-layout.content>
    <figure class="mb-48">
      <a href="javascript:;" title="Plan vergrössern" data-lightbox-open>
        <img src="/media/Allreal-Spiserstrasse-Umgebung.svg" width="1190" height="795" alt="Umgebungsplan Allreal Spiserstrasse" class="w-full">
      </a>
    </figure>
    <x-content.article>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex dicta iste explicabo possimus quas soluta? Molestias doloribus odit nobis qui culpa nihil facere, voluptatem ipsa. Eum similique quibusdam beatae id.</p>
    </x-content.article>
  </x-layout.content>
  <x-layout.sidebar class="max-w-[280px] md:max-w-none mt-42 md:mt-0">
    <x-content.list-item>
      <x-content.link-external url="https://maps.google.com" title="Karte öffnen">
        <span>Google Maps</span>
      </x-content.link-external>
    </x-content.list-item>
    <x-content.list-item>
      <x-content.link-external url="https://maps.google.com" title="Karte öffnen">
        <span>Webcam Baustelle</span>
      </x-content.link-external>
    </x-content.list-item>
  </x-layout.sidebar>
</x-layout.columns>
@endsection