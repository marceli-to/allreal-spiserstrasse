@props(['label', 'merge' => false])
<div {{ $attributes->merge(['class' => 'flex justify-between md:block col-span-2 border-b border-silver py-10 leading-none md:mr-16']) }}>
  @if (isset($label) && !$merge)
    <span class="block md:hidden">{!! $label !!}</span>
  @endif
  <div>
    @if (isset($label) && $merge)
      <span class="md:hidden">{!! $label !!}</span>
    @endif
    {{ $slot }}
  </div>
</div>