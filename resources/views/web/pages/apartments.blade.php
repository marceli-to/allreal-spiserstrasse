@extends('web.app')
@section('seo_title', __('Wohnungen'))
@section('page_title', __('Wohnungen'))
@section('content')
<x-layout.columns class="md:sticky md:top-0 z-10 bg-white md:pt-24 -md:mt-24 md:pb-32">
  <x-layout.content class="md:col-span-10 lg:col-span-7 lg:col-start-2">
    <x-apartments.isometrie />
  </x-layout.content>
  <x-layout.content class="md:col-span-2 lg:col-span-1 lg:col-start-9 relative">
    <x-icon.rotate />
    <x-icon.north-arrow />
  </x-layout.content>
  <x-layout.sidebar>
    <x-apartments.filter />
    <x-content.list-item class="mt-42">
      <x-content.link 
        url="/preisliste" 
        title="Karte öffnen"
        target="_blank">
        <span>Preisliste</span>
      </x-content.link>
    </x-content.list-item>
    <x-content.list-item class="mb-32 sm:mb-0">
      <x-content.link 
        url="/media/downloads/Allreal_Spiserstrasse_Kurzbaubeschrieb_230302.pdf" 
        title="Kurzbaubeschrieb"
        target="_blank">
        <span>Kurzbaubeschrieb</span>
      </x-content.link>
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