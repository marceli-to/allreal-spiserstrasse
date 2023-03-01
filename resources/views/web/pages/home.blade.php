@extends('web.app')
@section('content')
<div class="relative">
  <x-swiper>
    <x-swiper.slide :image="'allreal-1.jpg'" />
    <x-swiper.slide :image="'allreal-2.jpg'" />
    <x-swiper.slide :image="'allreal-3.jpg'" />
  </x-swiper>
  @include('web.pages.partials.home.news')
</div>
<section class="md:mt-48 md:grid md:grid-cols-16">
  <div class="md:col-span-10 md:col-start-1">
    <p class="font-light text-lg break-words hyphen-auto">
      An der Spiserstrasse in Zürich Albisrieden entsteht seit Januar 2023 ein siebengeschossiger Neubau mit 63 Eigentumswohnungen (Bauherrschaft Allreal) und rund 43 Mietwohnungen (Bauherrschaft Leutwyler Dienstleistungen AG). Die Überbauung wird im Minergie-Eco-Standard realisiert. Auf dem Dach kommen Photovoltaikanlagen zum Einsatz. Zudem ist ein Anschluss an das Fernwärmenetz der EWZ geplant.
    </p>
  </div>
</section>
@endsection