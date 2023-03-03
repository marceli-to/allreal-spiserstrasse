@props(['image', 'caption'])
<div class="swiper-slide">
  <figure>
    <img src="/media/{{ $image }}" alt="Placeholder" class="w-full aspect-[16/10] lg:aspect-[16/9] object-cover" />
    @if (isset($caption))
      <figcaption class="block pt-8">
        {{ $caption }}
      </figcaption>
    @endif
  </figure>
</div>