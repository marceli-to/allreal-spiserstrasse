<header class="grid grid-cols-4 lg:grid-cols-16 gap-16 min-h-[115px] lg:min-h-[140px] mb-32 lg:mb-0">

  <div class="col-span-2 lg:col-span-1 pt-24 lg:pt-40">
    <a 
      href="javascript:;" 
      data-menu-toggle 
      data-menu-toggle-burger 
      title="Menü anzeigen"
      class="inline-block w-auto">
      <x-icon.burger />
    </a>
  </div>

  <div class="col-span-11 pt-40 hidden lg:block leading-none">
    <x-content.heading-1 />
  </div>

  <div class="col-span-2 lg:col-span-4 flex justify-end pt-20 lg:pt-36">
    <a href="{{ route('page.home') }}" title="Startseite">
      <x-icon.logo class="block h-32 w-auto" />
    </a>
  </div>

  <div class="col-span-4 mt-20 lg:hidden leading-snug">
    <x-content.heading-1 />
  </div>

</header>
@include('web.partials.menu')