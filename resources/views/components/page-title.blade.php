<h1 class="font-light text-lg">
  @if (request()->routeIs('page.home'))
    {{ config('app.name') }}
  @else
    {{ config('app.name_short') }}@if(trim($__env->yieldContent('page_title')))&thinsp;/&thinsp;@yield('page_title')@endif
  @endif
</h1>