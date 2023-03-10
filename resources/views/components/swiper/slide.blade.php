@props(['image', 'caption', 'alt'])
<div class="swiper-slide">
  <figure>
    <x-content.picture :image="$image" :alt="$alt" />
    @if (isset($caption))
      <figcaption class="block pt-8">
        {{ $caption }}
      </figcaption>
    @endif
  </figure>
</div>