@extends('web.app')
@section('seo_title', $apartment->title)
@section('page_title', $apartment->type->id == 1 ? 'Atelier' : 'Wohnung')
@section('content')
<x-layout.columns>
  <x-layout.content>
      <div class="mb-8 h-20">
        <a href="javascript:history.back()" class="uppercase inline-flex items-center leading-none tracking-wider text-anthrazit" title="Zurück">
          <x-icon.arrow-left />
          <span class="block ml-8">Zurück</span>
        </a>
      </div>
      <figure class="block border-t border-t-anthrazit">
        <img 
          src="/media/plans/lg/Allreal_Spiserstrasse_{{ $apartment->number }}.png" 
          class="w-full h-auto" 
          alt="{{ $apartment->type->description !== 'Atelier' ? $apartment->rooms . ' Zimmer-Wohnung' : 'Atelier' }}, {{ $apartment->floorArray['label'] }}, {{ $apartment->street }}"
          width="200"
          height="250">
    </figure>
  </x-layout.content>
  <x-layout.sidebar>
    <div class="mt-28">
      <x-content.list-item class="flex justify-between py-10">
        <label class="block">{{ $apartment->type->id == 1 ? 'Atelier' : 'Wohnung' }}</label>
        {{ $apartment->number }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Zimmer</label>
        {{ $apartment->rooms }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Geschoss</label>
        {{ $apartment->floorArray['label'] }}
      </x-content.list-item>
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">
          @if ($apartment->type->id == 1)
            Fläche, ca. m<sup>2</sup>
          @else
            Wohnfläche, ca. m<sup>2</sup>
          @endif
        </label>
        {{ $apartment->area }}
      </x-content.list-item>
      @if ($apartment->area_exterior > 0)
        <x-content.list-item class="flex justify-between py-10 border-t-silver">
          <label class="block">Aussenfläche, ca. m<sup>2</sup></label>
          {{ $apartment->area_exterior }}
        </x-content.list-item>
      @endif
      <x-content.list-item class="flex justify-between py-10 border-t-silver">
        <label class="block">Verkaufspreis</label>
        {{ $apartment->state == 1 ? number_format($apartment->price , 2, ".", "\u{2009}") : '–' }}
      </x-content.list-item>
    </div>

    <div class="mt-44">
      <x-content.list-item>
        <a 
          href="/media/downloads/Allreal_Spiserstrasse_{{ $apartment->number }}.pdf" 
          target="_blank" 
          title="Download Grundriss {{ $apartment->number }}"
          class="flex justify-between py-10 hover:text-blue">
          <label class="block cursor-pointer">Grundriss</label>
          PDF
        </a>
      </x-content.list-item>
      <x-content.list-item class="border-t-silver">
        <a href="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb.pdf" 
          target="_blank" 
          class="flex justify-between py-10 hover:text-blue">
          <label class="block cursor-pointer">Kurzbaubeschrieb</label>
          PDF
        </a>
      </x-content.list-item>
    </div>
    <div class="mt-44">
      <x-content.list-item class="py-10">
        <label class="block">Lage</label>
        <figure>
          <img src="/media/plans/iso/Allreal_Spiserstrasse_{{ $apartment->number }}.png" alt="Lage Wohnung" width="300" height="253" class="w-full h-auto">
        </figure>
      </x-content.list-item>
    </div>
    @if ($apartment->type->id == 1)
    <div class="mt-12">
      <x-content.list-item class="flex justify-between py-10">
        <label>Dieses Atelier ist nicht als Wohnraum nutzbar.</label>
      </x-content.list-item>
    </div>
    @endif
  </x-layout.sidebar>
</x-layout.columns>

@endsection