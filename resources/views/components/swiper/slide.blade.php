@props(['image', 'caption'])
<div class="swiper-slide">
  <figure>
    <x-content.picture :image="$image" />
    @if (isset($caption))
      <figcaption class="block pt-8">
        {{ $caption }}
      </figcaption>
    @endif
  </figure>
</div>