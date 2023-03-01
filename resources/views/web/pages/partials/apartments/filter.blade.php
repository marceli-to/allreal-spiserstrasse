<x-list-item>
  <x-apartment-filter-link data-btn-filter-toggle="rooms">
    Anzahl Zimmer
  </x-apartment-filter-link>
</x-list-item>
@foreach (config('apartments.filter.rooms') as $value => $label)
  <x-list-item data-filter-item="rooms" class="hidden">
    <x-apartment-filter-link-item :type="'rooms'" value="{{$value}}" label="{!! $label !!}" />
  </x-list-item>
@endforeach

<x-list-item>
  <x-apartment-filter-link data-btn-filter-toggle="floor">
    Etage
  </x-apartment-filter-link>
</x-list-item>
@foreach (config('apartments.filter.floors') as $value => $label)
  <x-list-item data-filter-item="floor" class="hidden">
    <x-apartment-filter-link-item :type="'floor'" value="{{$value}}" label="{!! $label !!}" />
  </x-list-item>
@endforeach

<x-list-item>
  <x-apartment-filter-link data-btn-filter-toggle="state">
    Status
  </x-apartment-filter-link>
</x-list-item>
@foreach (config('apartments.filter.states') as $value => $label)
  <x-list-item data-filter-item="state" class="hidden">
    <x-apartment-filter-link-item :type="'state'" value="{{$value}}" label="{!! $label !!}" />
  </x-list-item>
@endforeach

<a 
  href="javascript:;" 
  class="uppercase block mt-32 text-center border border-silver text-silver leading-none py-8"
  data-btn-filter-reset>
  Filter zurücksetzen
</a>

