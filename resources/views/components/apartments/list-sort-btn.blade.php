<a href="javascript:;"
  {{ $attributes->merge(['class' => 'col-span-2 block py-10 leading-none mr-16 border-t border-t-silver border-b border-b-anthrazit']) }} 
  data-sortable-btn 
  data-sort-by="{{ $sortBy }}">
  {{$slot}}
</a>