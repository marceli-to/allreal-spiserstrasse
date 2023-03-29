@extends('web.app')
@section('content')
<div class="relative">
  <x-swiper>
    <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Innenhof'" :alt="''" />
  </x-swiper>
</div>
<section class="md:mt-48 flex flex-col md:grid md:grid-cols-16">
  <div class="order-2 md:order-1 md:col-span-10 md:col-start-1">
    <p class="font-light text-lg break-words hyphen-auto">
      An der Spiserstrasse in Zürich Albisrieden entsteht bis Mitte 2025 die Wohnüberbauung Spiserstrasse mit 57 Eigentumswohnungen, sechs Townhouses sowie sechs Ateliers. Die Überbauung wird im Minergie-Eco-Standard realisiert.
    </p>
  </div>
  <x-news />
</section>
@endsection