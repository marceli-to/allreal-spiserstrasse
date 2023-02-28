@extends('web.app')
@section('seo_title', __('Wohnungen'))
@section('page_title', __('Wohnungen'))
@section('content')
<div class="grid grid-cols-16 mb-44 md:sticky md:top-0 z-10 bg-white">
  <div class="col-span-10 lg:col-start-2 lg:col-span-8">
    @include('web.partials.apartments.isometrie')
  </div>
  <div class="col-start-12 col-span-4 lg:col-start-11 lg:col-span-3">
    @include('web.partials.apartments.filter')
  </div>
</div>

@include('web.partials.apartments.switcher')
@include('web.partials.apartments.list')
@include('web.partials.apartments.thumbnails')

@endsection