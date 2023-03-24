@extends('web.app')
@section('seo_title', __('Kontakt'))
@section('page_title', __('Kontakt'))
@section('content')
<x-layout.columns>
  <x-layout.content class="max-w-xl">
    <x-content.article>
      <p class="mb-16 text-base">
        Beratung und Verkauf<br>
        Thomas Altherr<br>
        Allreal Generalunternehmung AG<br>
        Lindbergh-Allee 1, 8152 Glattpark<br>
        Tel. <a href="tel:+41443191919">044 319 19 19</a><br>
      </p>
      <div id="app-form" class="mt-48"></div>
    </x-content.article>
  </x-layout.content>
</x-layout.columns>
@endsection