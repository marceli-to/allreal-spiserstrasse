<header class="grid grid-cols-16 min-h-[140px]">
  <div class="col-span-1 pt-40">
    @include('web.icons.burger')
  </div>
  <div class="col-span-11 pt-42">
    <h1 class="font-light text-lg leading-none">
      {{ config('app.name') }}@if(trim($__env->yieldContent('page_title')))&thinsp;/&thinsp;@yield('page_title')@endif
    </h1>
  </div>
  <div class="col-span-4 flex justify-end pt-36">
    <x-logo class="block h-32 w-auto" />
  </div>
</header>
@include('web.partials.menu')