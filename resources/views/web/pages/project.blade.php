@extends('web.app')
@section('seo_title', __('Projekt'))
@section('page_title', __('Projekt'))
@section('content')

<x-layout.columns>
  <x-layout.content>
    <div class="mb-48">
      <x-content.picture :image="'Allreal_Spiserstrasse_Aussen_Vogel'" :alt="'Aussenansicht'" />
    </div>
    <x-content.article>
      <p class="mb-16 lg:mb-24">Willkommen an der Spiserstrasse</p>
      <p class="mb-16 lg:mb-24">An gut erschlossener Lage in Zürich Albisrieden entsteht bis Mitte 2025 die Wohnüberbauung Spiserstrasse mit 57 63 Eigentumswohnungen, davon sechs Townhouses sowie sechs Ateliers. Das Projekt besticht unter anderem durch die hochwertige Architektur, eine Vielzahl unterschiedlicher Grundrisse und eine attraktive Aus- und Fernsicht.</p>
      <p class="mb-16 lg:mb-24">Zwei verschieden hohe, u-förmig angelegte Baukörper bilden einen geschützten halböffentlichen Innenhof mit Brunnen, Spielplatz und den privaten Loggien der Erdgeschosswohnungen.</p>
      <p class="mb-16 lg:mb-24">Das Angebot umfasst Wohnungen mit 2½ bis 6½ Zimmern und ca. 59 bis 151 Quadratmetern Fläche. Durch die sorgfältig gestalteten Grundrisse bieten sie eine gute Trennung von am Tag und in der Nacht genutzten Räumen und, trotz grosser Fensterflächen, ein hohes Mass an Privatsphäre. Alle Wohnungen unterhalb des Attikageschosses verfügen über eine grosse Loggia als geschützten Aussensitzplatz. Da sich das Gebäude gegen oben verjüngt, bieten die meisten Wohnungen im vierten und fünften Obergeschoss eine zusätzliche Terrasse, die Attikawohnungen bis zu deren drei.</p>
      <p class="mb-16 lg:mb-24">Eine Besonderheit sind die sechs Townhouses an der Spiserstrasse mit 3½ und 4½ Zimmern. Einem Doppeleinfamilienhaus gleich verteilen sich die Wohnräume über drei Geschosse, zuoberst liegt eine grosse private Dachterrasse. Jeweils zwei nebeneinander liegende Townhouses teilen sich einen Lift, der die Wohngeschosse rollstuhlgerecht verbindet. Die Townhouses werden vom Innenhof her erschlossen.</p>
      <p class="mb-16 lg:mb-24">Im Erdgeschoss der Gebäudezeile mit den Townhouses liegen zur Spiserstrasse hin insgesamt sechs Ateliers mit 16 bis 25 Quadratmetern Fläche. Sie verfügen alle über ein eigenes WC und eignen sich nicht nur als Atelier, sondern zum Beispiel auch als Praxis oder Büro. Eine Wohnnutzung ist baurechtlich nicht möglich.</p>
      <p class="mb-16 lg:mb-24">Die Wohnungen sind aus der gemeinsamen Tiefgarage zugänglich, wo jeder Parkplatz für die Montage einer Ladestation für Elektrofahrzeuge vorbereitet ist.</p>
      <p class="mb-16 lg:mb-24">Auf Nachhaltigkeit wird grossen Wert gelegt: Die gesamte Überbauung wird im Minergie-Eco-Standard erstellt, die Beheizung und die Erwärmung des Brauchwarmwassers erfolgen umweltfreundlich über einen Anschluss an das städtische Fernwärmenetz. Eine kontrollierte Wohnungslüftung garantiert jederzeit ein angenehmes Raumklima bei niedrigen Energiekosten. Darüber hinaus wird ein Teil des Stroms mit einer eigenen Photovoltaikanlage erzeugt.</p>
    </x-content.article>
  </x-layout.content>
</x-layout.columns>
@endsection