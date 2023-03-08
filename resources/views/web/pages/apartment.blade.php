@extends('web.app')
@section('seo_title', $apartment['title'])
@section('page_title', __('Wohnung'))
@section('content')
<x-layout.columns>
  <x-layout.content>
      <div class="mb-8 h-20">
        <a href="javascript:history.back()" class="uppercase inline-flex items-center leading-none font-medium text-anthrazit" title="Zurück">
          <x-icon.arrow-left />
          <span class="block ml-8">Zurück</span>
        </a>
      </div>
      <figure class="block border-t border-t-anthrazit">
        <img 
          src="/media/plans/lg/Allreal_Spiserstrasse_{{ $apartment['number'] }}.png" 
          class="w-full h-auto" 
          alt="{{ $apartment['type'] !== 'Atelier' ? $apartment['rooms'] . ' Zimmer-Wohnung' : 'Atelier' }}, {{ $apartment['floor']['label'] }}, {{ $apartment['street'] }}"
          width="200"
          height="250">
    </figure>
  </x-layout.content>
  <x-layout.sidebar>
    <div class="mt-28">
      <x-content.list-item class="flex justify-between py-10">
        <label class="block">Wohnung</label>
        {{ $apartment['number'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Zimmer</label>
        {{ $apartment['rooms'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Etage</label>
        {{ $apartment['floor']['label'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Fläche <sup>2</sup></label>
        {{ $apartment['area'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Terrasse <sup>2</sup></label>
        {{ $apartment['area_exterior'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Verkaufspreis</label>
        {{ number_format($apartment['price'] , 2, ".", "\u{2009}") }}
      </x-content.list-item>
    </div>

    <div class="mt-44">
      <x-content.list-item>
        <a href="" target="_blank" class="flex justify-between py-10 hover:text-blue">
          <label class="block cursor-pointer">Grundriss</label>
          PDF
        </a>
      </x-content.list-item>
      <x-content.list-item class="border-t-silver">
        <a href="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb_230302.pdf" 
          target="_blank" 
          class="flex justify-between py-10 hover:text-blue">
          <label class="block cursor-pointer">Kurzbaubeschrieb</label>
          PDF
        </a>
      </x-content.list-item>
    </div>

    <div class="mt-44">
      <x-content.list-item class="py-10">
        <label class="block mb-16">Lage</label>
        [iso mini]
      </x-content.list-item>
    </div>
  </x-layout.sidebar>
</x-layout.columns>

@endsection