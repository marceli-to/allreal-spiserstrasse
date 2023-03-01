@props(['image', 'caption'])
<div class="swiper-slide">
  <figure>
    <img src="/media/{{ $image }}" alt="Placeholder" class="w-full" />
    @if (isset($caption))
      <figcaption class="block pt-8">
        {{ $caption }}
      </figcaption>
    @endif
  </figure>
</div>