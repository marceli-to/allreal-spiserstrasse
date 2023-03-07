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
      
      <x-content.heading-2>Fassade/Fenster/Flachdach/Sonnenschutz</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Fassadenmauerwerk, tragend, in Backstein/Beton; Sockelgeschoss und Simse in Faserzement, mine­ralische Dämmung mit Rillen- und Kammputz in den Regelgeschossen, Betonelementabschlüsse</x-content.li>
      <x-content.li>Innenwände Wohnungen in Beton/Backstein</x-content.li>
      <x-content.li>Innenwände Keller in Beton/Kalksandstein</x-content.li>
      <x-content.li>Fenster in Holz/Metall, Hebeschiebetüre und Fenstertüren</x-content.li>
      <x-content.li>Lamellenstoren elektrisch betrieben</x-content.li>
      <x-content.li>Knickarm- oder Vertikalmarkisen elektrisch betrieben</x-content.li>
      <x-content.li>Terrasse/Loggia mit Feinsteinzeugplatten</x-content.li>
      <x-content.li>Flachdachaufbau mit Photovoltaikanlage</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Elektroanlagen</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Jede Wohnung mit Touchpanel «Smart Home» zur ­Bedienung der Gegensprechanlage</x-content.li>
      <x-content.li>Jedes Zimmer mit 3-fach-Steckdosen</x-content.li>
      <x-content.li>Jedes Zimmer mit Multimedia-Anschlussdose </x-content.li>
      <x-content.li>Lamellenstoren und Markisen elektrisch betrieben</x-content.li>
      <x-content.li>Entrée, Bad, Dusche, Küche mit Deckeneinbauleuchten</x-content.li>
      <x-content.li>Anschlüsse für Deckenlampen in Zimmer und </x-content.li>
      </x-content.ul>
      
      <x-content.heading-2 class="mb-8">Wohnen/Essen</x-content.heading-2>
      <x-content.heading-2>Heizungsanlage</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bezug von Fernwärme über Fernwärmenetzverbund Altstetten</x-content.li>
      <x-content.li>Wärmeverteilung über Bodenheizung, Einzelraum­regulierung nach Vorschrift des Energiegesetzes</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Lüftungsanlage</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Sämtliche Wohnungen sind mit einer kontrollierten Wohnraumlüftung ausgestattet</x-content.li>
      <x-content.li>Lüftungsgeräte in zentralen Technikräumen</x-content.li>
      <x-content.li>Stufenregelung in der Wohneinheit</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Sicherheit</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Fenster im Erdgeschoss mit mind. Widerstandsklasse RC2 (abschliessbare Fenstergriffe, einbruchhemmende Beschläge, VSG-Verglasung)</x-content.li>
      <x-content.li>Wohnungseingangstüren mit Mehrpunktverriegelung, Sicherheitslangschild und Türspion </x-content.li>
      </x-content.ul>

      <x-content.heading-2>Kücheneinrichtung</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Kücheneinrichtungen: Fronten, Naturstein-Arbeitsflächen und -Rückwand gemäss Ausbaulinie</x-content.li>
      <x-content.li>Apparate: Backofen, Steamer, Induktionsherd, Dampfabzug (Umluft), Kühlschrank und Geschirrspüler gemäss Ausbaulinie</x-content.li>
      <x-content.li>Unterbauleuchten</x-content.li>
      <x-content.li>Bei Attikawohnungen und Townhouses sind Mehrkosten bis CHF 10000.00 (exkl. MwSt., inkl. Planungskosten und Honorare) inbegriffen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Nasszellen</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Apparate in den Nasszellen in weiss gemäss Sanitärapparateliste</x-content.li>
      <x-content.li>Bei Attikawohnungen und Townhouses sind Mehrkosten bis CHF 10000.00 (exkl. MwSt., inkl. Planungskosten und Honorare) inbegriffen</x-content.li>
      <x-content.li>Im Duschbereich Boden mit Plattenbelag</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Waschen</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Waschmaschine und Wäschetrockner, Turmmontage in Nasszelle oder Réduit</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Schreinerarbeiten</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Wohnungseingangstüren: Eiche furniert mit Holzrahmen, Mehrpunktverriegelung, Türspion</x-content.li>
      <x-content.li>Innentüren: grundiert zum Streichen, mit Stahlzargen</x-content.li>
      <x-content.li>Kellertüren: fertig grundiert zum Streichen, mit Stahlzargen oder Holzrahmen</x-content.li>
      <x-content.li>Zwei Vorhangschienen eingelassen in Weissputzdecke</x-content.li>
      <x-content.li>Offene Garderobe mit Tablaren und Kleiderstange, teilweise mit Garderobenschrank kombiniert, innen kunstharzbeschichtet und Schranktüren grundiert zum Streichen</x-content.li>
      </x-content.ul>

      <x-content.heading-2 class="mb-8">Fertigbeläge</x-content.heading-2>
      <x-content.heading-2>Korridor, Entrée, Wohnen, Essen, Zimmer</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag aus Parkett mit Holzsockel. Budget brutto CHF 130.00/m², Attika und Townhouses CHF 180.00/m² (exkl. MwSt.), fertig verlegt</x-content.li>
      <x-content.li>Wände mit Weissputz, weiss gestrichen</x-content.li>
      <x-content.li>Decke mit Weissputz, weiss gestrichen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Küche</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag aus Parkett mit Holzsockel. Budget brutto CHF 130.00/m², Attika und Townhouses CHF 180.00/m² (exkl. MwSt.), fertig verlegt</x-content.li>
      <x-content.li>Wände mit Weissputz, weiss gestrichen</x-content.li>
      <x-content.li>Decke mit Weissputz, weiss gestrichen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Bad, Dusche</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbeläge mit Feinsteinzeugplatten inkl. Sockel. Budget brutto CHF 65.00/m², Attika und Townhouses CHF 80.00/m² (exkl. MwSt.), Materialpreis</x-content.li>
      <x-content.li>Wände im Bereich der Sanitärapparate mit Feinsteinzeugplatten</x-content.li>
      <x-content.li>Budget brutto CHF 65.00/m², Attika und Townhouses CHF 80.00/m² (exkl. MwSt.), Materialpreis</x-content.li>
      <x-content.li>Restliche Wandflächen mit Weissputz, weiss gestrichen</x-content.li>
      <x-content.li>Decke mit Weissputz, weiss gestrichen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Loggia und Terrasse</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag mit Feinsteinzeugplatten</x-content.li>
      <x-content.li>Brüstungen Beton, lasiert gestrichen oder Aussenwärmedämmung, verputzt und gestrichen</x-content.li>
      <x-content.li>Decke Beton, lasiert gestrichen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Keller</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag aus Zementüberzug, roh</x-content.li>
      <x-content.li>Wände aus Kalksandstein/Beton, weiss gestrichen, Kellerelementwände</x-content.li>
      <x-content.li>Decke Beton, weiss gestrichen, Haustechnikinstallationen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Trocknen</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag aus keramischen Platten, gestrichen</x-content.li>
      <x-content.li>Wände aus Kalksandstein, weiss gestrichen</x-content.li>
      <x-content.li>Decke Beton, weiss gestrichen, Haustechnikinstallationen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Schleuse/Korridor, Velo- und Kinderwagen, Technik, Hauswart</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag aus Zementüberzug, roh</x-content.li>
      <x-content.li>Wände Beton / Kalksandstein, weiss gestrichen</x-content.li>
      <x-content.li>Decke Beton weiss gestrichen oder Dämmung, Haustechnikinstallationen</x-content.li>
      </x-content.ul>

      <x-content.heading-2>Treppenhäuser, Eingangshalle</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag auf Treppenstufen, Podeste und Vorplätze aus Kunststeinplatten mit Sockel</x-content.li>
      <x-content.li>Wände mit Glasfasertapete, Weissputz, gestrichen</x-content.li>
      <x-content.li>Decke mit Weissputz, gestrichen</x-content.li>
      <x-content.li>Treppenlaufuntersichten und Wangen in Weissputz, gestrichen</x-content.li>
      </x-content.ul>
      
      <x-content.heading-2>Tiefgarage</x-content.heading-2>
      <x-content.ul>
      <x-content.li>Bodenbelag in Hartbeton roh, Parkplatzmarkierungen</x-content.li>
      <x-content.li>Garagentore bei Einfahrt elektrisch mit Handsender</x-content.li>
      <x-content.li>E-Mobility-Erschliessung für Elektrofahrzeuge vorbereitet, pro Parkplatz ausbaubar</x-content.li>
      <x-content.li>Wände Beton, gestrichen</x-content.li>
      <x-content.li>Decke Beton, gestrichen oder Dämmung, Haustechnikinstallationen</x-content.li>
      <x-content.li>Mechanische Fortluftanlage</x-content.li>
      <x-content.li>Komplette Beleuchtungsinstallation</x-content.li>
      </x-content.ul>

    </x-content.article>
    </x-layout.content>
</x-layout.columns>
@endsection