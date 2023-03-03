@extends('web.app')
@section('seo_title', __('Kurzbaubeschrieb'))
@section('page_title', __('Kurzbaubeschrieb'))
@section('content')
<x-layout.columns>
  <x-layout.content class="content max-w-xl">
    <x-content.article>

      <x-content.heading-2>Allgemein</x-content.heading-2>
      <x-content.ul>
        <x-content.li>Die Gebäude werden nach den Vorgaben des Minergie-ECO Standards mit Photovoltaikanlagen sowie mit kontrollierter Wohnungslüftung erstellt</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Fassade / Fenster / Flachdach / Sonnenschutz</x-content.heading-2>
      <x-content.ul>
        <x-content.li>Fassadenmauerwerk, tragend, in Backstein / Beton; Sockelgeschoss und Simse in Faserzement, mineralische Dämmung mit Rillen- und Kammputz in den Regelgeschossen, Betonelementabschlüsse</x-content.li>
        <x-content.li>Innenwände Wohnungen in Beton / Backstein</x-content.li>
        <x-content.li>Innenwände Keller in Beton / Kalksandstein</x-content.li>
        <x-content.li>Fenster in Holz / Metall, Hebeschiebetüre und Fenstertüren</x-content.li>
        <x-content.li>Lamellenstoren elektrisch betrieben</x-content.li>
        <x-content.li>Knickarm- oder Vertikalmarkisen elektrisch betrieben</x-content.li>
        <x-content.li>Terrasse / Loggia mit Feinsteinzeugplatten</x-content.li>
        <x-content.li>Flachdachaufbau mit Photovoltaikanlage</x-content.li>
      </x-content.ul>
      
    </x-content.article>
    </x-layout.content>
</x-layout.columns>
@endsection