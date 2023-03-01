@props(['image', 'caption'])
<div class="swiper-slide">
  <figure>
    <img src="/media/{{ $image }}" alt="Placeholder" class="w-full" />
    <figcaption class="block pt-8">
      {{ $caption }}
    </figcaption>
  </figure>
</div>