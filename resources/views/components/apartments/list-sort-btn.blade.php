<a href="javascript:;"
  {{ $attributes->merge(['class' => 'col-span-2 flex justify-between py-10 leading-none mr-16 border-t border-t-silver border-b border-b-anthrazit hover:text-black group']) }} 
  data-sortable-btn 
  data-sort-by="{{ $sortBy }}">
  <span class="block">{{$slot}}</span>
  @include('web.icons.arrow-up-down')
</a>