@extends('web.app')
@section('seo_title', __('Objekte'))
@section('page_title', __('Objekte'))
@section('content')
<x-layout.columns class="md:sticky md:top-0 z-10 bg-white md:pt-24 -md:mt-24 md:pb-32">
  <x-layout.content class="md:col-span-9 lg:col-span-7 lg:col-start-2">
    <x-apartments.isometrie :apartments="$apartments" />
  </x-layout.content>
  <x-layout.content class="md:col-span-2 lg:col-span-1 lg:col-start-9 relative">
    <x-icon.rotate />
    <x-icon.north-arrow />
  </x-layout.content>
  <x-layout.sidebar data-filter="">
    <x-apartments.filter />
    <x-content.list-item class="mt-42">
      <a 
        href="/preisliste?v={{time()}}" 
        title="Download Preisliste" 
        target="_blank" 
        class="flex justify-between py-10 hover:text-blue">
        <label class="block cursor-pointer">Preisliste</label>
        PDF
      </a>
    </x-content.list-item>
    <x-content.list-item>
      <a 
        href="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb.pdf" 
        title="Download Kurzbaubeschrieb" 
        target="_blank" 
        class="flex justify-between py-10 hover:text-blue">
        <label class="block cursor-pointer">Kurzbaubeschrieb</label>
        PDF
      </a>
    </x-content.list-item>
    <x-content.list-item class="mb-32 sm:mb-0">
      <a 
        href="/media/downloads/Allreal_Spiserstrasse_Grundrisse.pdf" 
        title="Download Grundrisse" 
        target="_blank" 
        class="flex justify-between py-10 hover:text-blue">
        <label class="block cursor-pointer">Grundrisse</label>
        PDF
      </a>
    </x-content.list-item>
  </x-layout.sidebar>
</x-layout.columns>

<x-layout.columns>
  <x-layout.content class="mb-32">
    <x-apartments.switcher />
  </x-layout.content>
</x-layout.columns>

<section data-no-results class="is-hidden mb-8">
  <x-layout.columns>
    <x-layout.content>
      Ihre Suche ergab keine Treffer.
    </x-layout.content>
  </x-layout.columns>
</section>

<section data-view="list" class="block is-visible">
  <x-apartments.list :apartments="$apartments" />
</section>

<section data-view="thumbnails" class="is-hidden">
  <x-apartments.thumbnails :apartments="$apartments" />
</section>
@endsection