@extends('web.app')
@section('seo_title', __('Wohnungen'))
@section('page_title', __('Wohnungen'))
@section('content')
<div class="grid grid-cols-16 mb-44">
  <div class="col-span-10 lg:col-start-2 lg:col-span-8">
    <figure>
      <img src="https://via.placeholder.com/616x320" alt="Projekt" class="w-full">
    </figure>
  </div>
  <div class="col-start-12 col-span-4 lg:col-start-11 lg:col-span-3">

  </div>
</div>

<div class="grid grid-cols-16">
  <nav class="col-span-16 lg:col-start-2 mb-32">
    <ul class="flex">
      <li>
        <a href="" class="uppercase block mr-4">Liste</a>
      </li>
      <li class="ml-4 mr-4">/</li>
      <li>
        <a href="" class="uppercase font-medium">Grundrisse</a>
      </li>
    </ul>
  </nav>
</div>

<div class="grid grid-cols-16">
  <div class="col-span-16 lg:col-start-2 lg:col-span-12">
    <div class="grid grid-cols-12">
      <x-apartment-list-sort-btn sortBy="number">Nummer</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="rooms">Zimmer</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="floor">Etage</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="area">Fläche</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="price">Preis</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="state" class="mr-0">Status</x-apartment-list-sort-btn>
    </div>
  </div>
</div>

<div class="grid grid-cols-16" data-sortable-list>
  @foreach($apartments as $a) 
    <x-apartment-list-link :apartment="$a">
      <x-apartment-list-item>{{ $a['number'] }}</x-apartment-list-item>
      <x-apartment-list-item>{{ $a['type'] }}</x-apartment-list-item>
      <x-apartment-list-item>{{ $a['floor'] }}</x-apartment-list-item>
      <x-apartment-list-item>{{ $a['area'] }} m<sup class="text-xxs">2</sup></x-apartment-list-item>
      <x-apartment-list-item>{{ $a['price'] }}</x-apartment-list-item>
      <x-apartment-list-item class="mr-0">{{ $a['state']['value'] }}</x-apartment-list-item>
    </x-apartment-list-link>
  @endforeach
</div>
@endsection