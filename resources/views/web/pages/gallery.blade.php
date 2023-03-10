@extends('web.app')
@section('seo_title', __('Galerie'))
@section('page_title', __('Galerie'))
@section('content')
<x-swiper>
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Innenhof'" :alt="'Innenhof'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Terrasse'" :alt="'Terrasse'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Vogel'" :alt="'Vogelperspektive'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Bad-4-5'" :alt="'Bad 4-5'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche-4-5'" :alt="'Küche 4-5'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche'" :alt="'Küche'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Loggia'" :alt="'Loggia'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Wohnen-4-5'" :alt="'Wohnen'" />
</x-swiper>
@endsection