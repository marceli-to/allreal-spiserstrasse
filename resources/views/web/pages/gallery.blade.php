@extends('web.app')
@section('seo_title', __('Galerie'))
@section('page_title', __('Galerie'))
@section('content')
<x-swiper>
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Innenhof'" :alt="'Innenhof, im Vordergrund Haus 10'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Townhouse_Dachgarten'" :alt="'Townhouse, Dachgarten'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Townhouse_Wohnen-Essen'" :alt="'Townhouse, Wohnen/Essen'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Townhouse_Querschnitt'" :alt="'Townhouse, Querschnitt'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Terrasse'" :alt="'Ausblick von der Terrasse der Wohnung 10.602 Richtung Uetliberg'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Vogel'" :alt="'Blick Richtung Osten, im Vordergrund die Spiserstrasse'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Bad-4-5'" :alt="'Wohnung 10.302'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche-4-5'" :alt="'Wohnung 10.302'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche'" :alt="'Wohnung 10.303'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Loggia'" :alt="'Wohnung 10.303'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Wohnen-4-5'" :alt="'Wohnung 10.302'" />
</x-swiper>
@endsection