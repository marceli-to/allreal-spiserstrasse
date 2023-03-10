@extends('web.app')
@section('seo_title', __('Galerie'))
@section('page_title', __('Galerie'))
@section('content')
<x-swiper>
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Innenhof'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Terrasse'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Aussen_Vogel'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Bad-4-5'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche-4-5'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Kueche'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Loggia'" />
  <x-swiper.slide :image="'Allreal_Spiserstrasse_Innen_Wohnen-4-5'" />
</x-swiper>
@endsection