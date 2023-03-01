<div class="swiper">
  <div class="swiper-wrapper">
    {{ $slot }}
  </div>
  <a href="javascript:;" class="swiper-btn-prev block absolute left-16 z-10 w-19 h-32 top-[calc(50%-1rem)] lg:w-28 lg:h-48 lg:top-[calc(50%-1.5rem)]">
    @include('web.icons.swiper-arrow-prev')
  </a>
  <a href="javascript:;" class="swiper-btn-next block absolute right-16 z-10 w-19 h-32 top-[calc(50%-1rem)] lg:w-28 lg:h-48 lg:top-[calc(50%-1.5rem)]">
    @include('web.icons.swiper-arrow-next')
  </a>
</div>