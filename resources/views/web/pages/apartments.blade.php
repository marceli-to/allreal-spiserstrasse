@extends('web.app')
@section('seo_title', __('Wohnungen'))
@section('page_title', __('Wohnungen'))
@section('content')
<div class="grid grid-cols-16 gap-16 mb-44 md:sticky md:top-0 z-10 bg-white">
  <div class="col-span-10 lg:col-start-2 lg:col-span-8">
    @include('web.pages.partials.apartments.isometrie')

    <a href="javascript:;" data-btn-rotate>Rotate</a>

  </div>
  <div class="col-start-12 col-span-4 lg:col-start-11 lg:col-span-3">
    @include('web.pages.partials.apartments.filter')

    <a href="/preisliste" target="_blank" class="block mt-32">Preisliste</a>

  </div>
</div>
@include('web.pages.partials.apartments.switcher')
@include('web.pages.partials.apartments.no-results')
@include('web.pages.partials.apartments.list')
@include('web.pages.partials.apartments.thumbnails')
@endsection