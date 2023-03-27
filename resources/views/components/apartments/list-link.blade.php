<a 
  href="{{ route('page.apartment', ['slug' => $apartment->slug, 'apartment' => $apartment->id]) }}" 
  title="Wohnung {{ $apartment->number }} anzeigen" 
  {{ $attributes->merge(['class' => 'border-t border-t-anthrazit md:border-none mb-44 md:mb-0 col-span-16 lg:col-start-2 lg:col-span-12 md:grid md:grid-cols-12 md:hover:bg-blue-light']) }}
  data-filterable
  data-sortable
  data-list-item
  data-number="{{ $apartment->number }}" 
  data-rooms="{{ $apartment->rooms }}"
  data-floor="{{ $apartment->floorArray['order'] }}"
  data-type="{{ $apartment->type->id }}"
  data-area="{{ $apartment->area }}"
  data-areaRange="{{ $apartment->filter_area }}"
  data-price="{{ $apartment->price }}"
  data-priceRange="{{ $apartment->filter_price }}"
  data-state="{{ $apartment->stateArray['order'] }}">
  {{ $slot }}
</a>
