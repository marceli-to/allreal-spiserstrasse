@props(['image', 'alt' => ''])
<picture>
  <source media="(min-width: 1200px)" srcset="/media/{{ $image }}-lg.jpg">        
  <source media="(min-width: 768px)" srcset="/media/{{ $image }}-md.jpg">
  <source srcset="/media/{{ $image }}-sm.jpg">
  <img src="/media/{{ $image }}-sm.jpg" alt="{{ $alt }}" title="{{ $alt }}" height="1600" width="1000" class="w-full aspect-[16/10] lg:aspect-[16/9] object-cover">
</picture>