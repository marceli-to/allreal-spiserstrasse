<div class="hidden md:grid md:grid-cols-16">
  <div class="col-span-16 lg:col-start-2 lg:col-span-12">
    <header class="grid grid-cols-12">
      <x-apartment-list-sort-btn sortBy="number">Nummer</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="rooms">Zimmer</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="floor">Etage</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="area">Fläche</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="price">Preis</x-apartment-list-sort-btn>
      <x-apartment-list-sort-btn sortBy="state" class="mr-0">Status</x-apartment-list-sort-btn>
    </header>
  </div>
</div>
<div class="grid grid-cols-16" data-sortable-list>
  @foreach($apartments as $a) 
    <x-apartment-list-link :apartment="$a">
      <x-apartment-list-item :label="'Wohnung'" :merge="true">{{ $a['number'] }}</x-apartment-list-item>
      <x-apartment-list-item :label="'Zimmer'">{{ $a['type'] }}</x-apartment-list-item>
      <x-apartment-list-item :label="'Etage'">{{ $a['floor']['label'] }}</x-apartment-list-item>
      <x-apartment-list-item :label="'Fläche'">{{ $a['area'] }} m<sup class="text-xxs">2</sup></x-apartment-list-item>
      <x-apartment-list-item :label="'Verkaufspreis'">{{ number_format($a['price'] , 2, ".", "\u{2009}") }}</x-apartment-list-item>
      <x-apartment-list-item class="hidden md:block md:mr-0">{{ $a['state']['value'] }}</x-apartment-list-item>
    </x-apartment-list-link>
  @endforeach
</div>
