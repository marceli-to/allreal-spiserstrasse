@props(['image', 'caption', 'alt'])
<div class="swiper-slide">
  <figure>
    <x-content.picture :image="$image" :alt="$alt" />
    @if (isset($alt))
      <figcaption class="block text-lg pt-8">
        {{ $alt }}
      </figcaption>
    @endif
  </figure>
</div>