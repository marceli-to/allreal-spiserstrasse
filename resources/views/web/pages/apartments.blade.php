@extends('web.app')
@section('seo_title', __('Wohnungen'))
@section('page_title', __('Wohnungen'))
@section('content')
<x-layout.columns>
  <x-layout.content>
    @include('web.pages.partials.apartments.isometrie')
    <a href="javascript:;" data-btn-rotate>Rotate</a>
  </x-layout.content>
  <x-layout.sidebar>
    @include('web.pages.partials.apartments.filter')
    <x-content.list-item class="mt-48">
      <x-content.link 
        url="/preisliste" 
        title="Karte öffnen"
        target="_blank">
        <span>Preisliste</span>
      </x-content.link>
    </x-content.list-item>
    <x-content.list-item>
      <x-content.link 
        url="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb_230302.pdf" 
        title="Kurzbaubeschrieb"
        target="_blank">
        <span>Kurzbaubeschrieb</span>
      </x-content.link>
    </x-content.list-item>
  </x-layout.sidebar>
</x-layout.columns>


{{-- <div class="grid grid-cols-16 gap-16 mb-44 md:sticky md:top-0 z-10 bg-white">
  <div class="col-span-10 lg:col-start-2 lg:col-span-8">
    @include('web.pages.partials.apartments.isometrie')
    <a href="javascript:;" data-btn-rotate>Rotate</a>
  </div>
  <div class="col-start-12 col-span-4 lg:col-start-11 lg:col-span-3">
    @include('web.pages.partials.apartments.filter')
    <x-content.list-item class="mt-48">
      <x-content.link 
        url="/preisliste" 
        title="Karte öffnen"
        target="_blank">
        <span>Preisliste</span>
      </x-content.link>
    </x-content.list-item>
    <x-content.list-item>
      <x-content.link 
        url="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb_230302.pdf" 
        title="Kurzbaubeschrieb"
        target="_blank">
        <span>Kurzbaubeschrieb</span>
      </x-content.link>
    </x-content.list-item>
  </div>
</div> --}}
@include('web.pages.partials.apartments.switcher')
@include('web.pages.partials.apartments.no-results')
@include('web.pages.partials.apartments.list')
@include('web.pages.partials.apartments.thumbnails')
@endsection