@extends('web.app')
@section('seo_title', __('Lage'))
@section('page_title', __('Lage'))
@section('content')
<x-content.lightbox>
  <figure>
    <img 
      src="/media/Allreal_Spiserstrasse_Umgebung.svg" 
      width="1190" 
      height="795" 
      alt="Umgebungsplan Allreal Spiserstrasse" class="w-full bg-white">
  </figure>
</x-content.lightbox>
<x-layout.columns>
  <x-layout.content>
    <figure class="mb-48">
      <a href="javascript:;" title="Plan vergrössern" data-lightbox-open>
        <img src="/media/Allreal_Spiserstrasse_Umgebung.svg" width="1190" height="795" alt="Umgebungsplan Allreal Spiserstrasse" class="w-full">
      </a>
    </figure>
    <x-content.article>
      <h2 class="mb-16 lg:mb-24">Zürich Albisrieden</h2>
      <p class="mb-16 lg:mb-24">Die Eigentumswohnungen Spiserstrasse liegen gut erschlossen inmitten einer städtischen, von Ein- und Mehrfamilienhäusern aber auch von Gewerbebauten und Sportanlagen geprägten Nachbarschaft. Natur- und Sportliebhaber sind rund einen Kilometer vom Wald und Erholungsgebiet entfernt. Das Stadion Utogrund, das Freibad Letzigraben wie auch Einkaufsmöglichkeiten für den täglichen Bedarf liegen in Gehdistanz. Kindergarten, Primar- und Oberstufenschulen sind gut zu Fuss erreichbar. Es bestehen diverse Betreuungsangebote, die von den Schulen oder von Privaten organisiert werden.</p>
      <h3>Anschluss</h3>
      <p class="mb-16 lg:mb-24">Die Haltestelle «Siemens» der Tramlinie 3 liegt quasi vor der Haustür, die Haltestelle «Albisrank» der Buslinien 83 und 89 liegen rund 250 Meter von der Überbauung Spiserstrasse entfernt.</p>
      <p class="mb-16 lg:mb-24">Der Autobahnschluss an die A1H bei der Europabrücke ist in knapp 5 Minuten erreichbar.</p>
    </x-content.article>
  </x-layout.content>

</x-layout.columns>

@endsection