@extends('web.app')
@section('content')
<x-swiper>
  <x-swiper.slide :image="'allreal-1.jpg'" :caption="'Lorem ipsm dolor'" />
  <x-swiper.slide :image="'allreal-2.jpg'" :caption="'Lorem ipsm dolor'" />
  <x-swiper.slide :image="'allreal-3.jpg'" :caption="'Lorem ipsm dolor'" />
</x-swiper>
@endsection