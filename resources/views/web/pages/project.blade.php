@extends('web.app')
@section('seo_title', __('Projekt'))
@section('page_title', __('Projekt / Lage'))
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
      <p class="mb-16 lg:mb-24">Willkommen an der Spiserstrasse</p>
      <p class="mb-16 lg:mb-24">An gut erschlossener Lage in Zürich Albisrieden entsteht bis Anfang 2025 die Wohnüberbauung Spiserstrasse mit 57 Eigentumswohnungen, sechs Townhouses sowie sechs Ateliers. Das Projekt besticht unter anderem durch die hochwertige Architektur, eine Vielzahl unterschiedlicher Grundrisse und eine attraktive Aus- und Fernsicht.</p>
      <p class="mb-16 lg:mb-24">Zwei verschieden hohe, u-förmig angelegte Baukörper bilden einen geschützten halböffentlichen Innenhof mit Brunnen, Spielplatz und den privaten Gärten der Erdgeschosswohnungen.</p>
      <p class="mb-16 lg:mb-24">Die einzelnen Wohnungen mit 2½ bis 6½ Zimmern und ca. 59 bis 150 Quadratmetern Fläche bieten durch die sorgfältig gestalteten Grundrisse mit einer guten Trennung von am Tag und in der Nacht genutzten Räumen trotz grosser Fensterflächen ein hohes Mass an Privatsphäre. Alle Wohnungen unterhalb des Attikageschosses verfügen über eine grosse eingezogene Loggia als geschützten Aussensitzplatz. Da sich das Gebäude gegen oben verjüngt, bieten die meisten Wohnungen im vierten und fünften Obergeschoss eine zusätzliche Terrasse, die Attikawohnungen über bis zu deren drei.</p>
      <p class="mb-16 lg:mb-24">Eine Besonderheit sind die sechs dreigeschossigen Townhouses an der Spiserstrasse mit 3½ und 4½ übereinander angeordneten Zimmern und einer privaten Dachterrasse. Jeweils zwei nebeneinander liegende Wohnungen teilen sich einen Lift, der die drei Wohngeschosse rollstuhlgerecht verbindet.</p>
      <p class="mb-16 lg:mb-24">Die Townhouses werden vom Innenhof her erschlossen.</p>
      <p class="mb-16 lg:mb-24">Im Erdgeschoss der Gebäudezeile mit den Townhouses liegen zur Spiserstrasse hin insgesamt sechs Ateliers mit 16 bis 25 Quadratmetern Fläche. Sie verfügen alle über ein eigenes WC und eignen sich nicht nur als Atelier, sondern zum Beispiel auch als Praxis oder Büro. Eine Wohnnutzung ist baurechtlich nicht möglich.</p>
      <p class="mb-16 lg:mb-24">Die Wohnungen sind aus der gemeinsamen Tiefgarage zugänglich, wo jeder Parkplatz für die Montage einer Ladestation für Elektrofahrzeuge vorbereitet ist.</p>
      <p class="mb-16 lg:mb-24">Auf Nachhaltigkeit wird grossen Wert gelegt: Die gesamte Überbauung wird im Minergie-Eco-Standard erstellt, die Beheizung und die Erwärmung des Brauchwarmwassers erfolgen über einen Anschluss an das Fernwärmenetz. Eine kontrollierte Wohnungslüftung garantiert jederzeit ein angenehmes Raumklima bei niedrigen Energiekosten. Darüber hinaus wird ein Teil des Stroms mit einer eigenen Photovoltaikanlage erzeugt.</p>
    </x-content.article>
    <x-content.article>
      <h2 class="mb-16 lg:mb-24">Zürich Albisrieden</h2>
      <p class="mb-16 lg:mb-24">Die Eigentumswohnungen Spiserstrasse liegen gut erschlossen inmitten einer städtischen, von Ein- und Mehrfamilienhäusern aber auch von Gewerbebauten und Sportanlagen geprägten Nachbarschaft. Natur- und Sportliebhaber sind rund einen Kilometer vom Wald und Erholungsgebiet entfernt. Das Stadion Utogrund, das Freibad Letzigraben wie auch Einkaufsmöglichkeiten für den täglichen Bedarf liegen in Gehdistanz. Kindergarten, Primar- und Oberstufenschulen sind gut zu Fuss erreichbar. Es bestehen diverse Betreuungsangebote, die von den Schulen oder von Privaten organisiert werden.</p>
      <h3>Anschluss</h3>
      <p class="mb-16 lg:mb-24">Die Haltestelle «Siemens» der Tramlinie 3 liegt quasi vor der Haustür, die Haltestelle «Albisrank» der Buslinien 83 und 89 liegen rund 250 Meter von der Überbauung Spiserstrasse entfernt.</p>
      <p class="mb-16 lg:mb-24">Der Autobahnschluss an die A1H bei der Europabrücke ist in knapp 5 Minuten erreichbar.</p>
    </x-content.article>
  </x-layout.content>
  <x-layout.sidebar class="max-w-[280px] md:max-w-none mt-42 md:mt-0">
    <x-content.list-item>
      <x-content.link-external url="https://goo.gl/maps/bTT5LVBVSoRUJNP68" title="Karte öffnen">
        <span>Google Maps</span>
      </x-content.link-external>
    </x-content.list-item>
    <x-content.list-item>
      <x-content.link-external url="https://maps.google.com" title="Webcam Baustelle öffnen">
        <span>Webcam Baustelle</span>
      </x-content.link-external>
    </x-content.list-item>
  </x-layout.sidebar>
</x-layout.columns>
@endsection