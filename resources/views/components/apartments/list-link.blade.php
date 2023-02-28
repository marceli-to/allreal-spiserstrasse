<a 
  href="" 
  title="Wohnung {{ $apartment['number'] }} anzeigen" 
  {{ $attributes->merge(['class' => 'col-span-16 lg:col-start-2 lg:col-span-12 grid grid-cols-12 hover:bg-blue-light']) }}
  data-number="{{ $apartment['number'] }}" 
  data-rooms="{{ $apartment['rooms'] }}"
  data-floor="{{ $apartment['floor'] }}"
  data-area="{{ $apartment['area'] }}"
  data-price="{{ $apartment['price'] }}"
  data-state="{{ $apartment['state']['order'] }}">
  {{$slot}}
</a>
