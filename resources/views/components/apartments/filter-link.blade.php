<a 
  href="javascript:;"
  {{ $attributes->merge(['class' => 'py-10 flex justify-between items-center group']) }}>
  <span>{{ $slot }}</span>
  <x-icon.chevron-up-down />
</a>