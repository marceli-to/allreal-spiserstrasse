<a 
  href="javascript:;"
  {{ $attributes->merge(['class' => 'py-10 flex justify-between items-center group']) }}>
  <span>{{ $slot }}</span>
  @include('web.icons.chevron-up-down')
</a>