<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="rooms">
    Anzahl Zimmer
  </x-apartment-filter-link>
</x-content.list-item>
@foreach (config('apartments.filter.rooms') as $value => $label)
  <x-content.list-item data-filter-item="rooms" class="is-hidden">
    <x-apartment-filter-link-item :type="'rooms'" value="{{$value}}" label="{!! $label !!}" />
  </x-content.list-item>
@endforeach

<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="floor">
    Etage
  </x-apartment-filter-link>
</x-content.list-item>
@foreach (config('apartments.filter.floors') as $value => $label)
  <x-content.list-item data-filter-item="floor" class="is-hidden">
    <x-apartment-filter-link-item :type="'floor'" value="{{$value}}" label="{!! $label !!}" />
  </x-content.list-item>
@endforeach

<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="type">
    Typ
  </x-apartment-filter-link>
</x-content.list-item>
@foreach (config('apartments.filter.types') as $value => $label)
  <x-content.list-item data-filter-item="type" class="is-hidden">
    <x-apartment-filter-link-item :type="'type'" value="{{$value}}" label="{!! $label !!}" />
  </x-content.list-item>
@endforeach

<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="area">
    Wohnfläche
  </x-apartment-filter-link>
</x-content.list-item>

<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="price">
    Kaufpreis
  </x-apartment-filter-link>
</x-content.list-item>

<x-content.list-item data-btn-filter-wrapper="">
  <x-apartment-filter-link data-btn-filter-toggle="state">
    Status
  </x-apartment-filter-link>
</x-content.list-item>
@foreach (config('apartments.filter.states') as $value => $label)
  <x-content.list-item data-filter-item="state" class="is-hidden">
    <x-apartment-filter-link-item :type="'state'" value="{{$value}}" label="{!! $label !!}" />
  </x-content.list-item>
@endforeach
<a 
  href="javascript:;" 
  class="uppercase block mt-32 text-center border border-anthrazit text-anthrazit leading-none py-10 tracking-wider"
  data-btn-filter-reset>
  Filter zurücksetzen
</a>