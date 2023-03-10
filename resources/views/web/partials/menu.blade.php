<nav 
  class="bg-white bg-opacity-95 min-h-full absolute top-0 left-0 z-50 hidden pl-16 pt-20 lg:pt-0 w-[50%] lg:w-[calc(25%-1rem)]"
  data-menu>
  <div class="lg:grid lg:grid-cols-4">
    <a href="javascript:;" class="block ml-1 lg:mt-38 lg:col-span-1" data-menu-toggle title="Menü verbergen">
      <x-icon.cross />
    </a>
    <ul class="mt-40 lg:mt-0 lg:pt-35 lg:ml-7 lg:col-span-3">
      <x-menu.item href="{{ route('page.project') }}" class="{{ request()->routeIs('page.project') ? '' : '' }}">
        Projekt
      </x-menu.item>
      <x-menu.item href="{{ route('page.apartments') }}" class="{{ request()->routeIs('page.apartments') ? '' : '' }}">
        Objekte
      </x-menu.item>
      <x-menu.item href="{{ route('page.features') }}" class="{{ request()->routeIs('page.features') ? '' : '' }}">
        Kurzbaubeschrieb
      </x-menu.item>
      <x-menu.item href="{{ route('page.gallery') }}" class="{{ request()->routeIs('page.gallery') ? '' : '' }}">
        Galerie
      </x-menu.item>
      <x-menu.item href="https://spiserstrasse.designraum.ch/" class="{{ request()->routeIs('page.round-tour') ? '' : '' }}" target="_blank">
        360°-Rundgang
      </x-menu.item>
      <x-menu.item href="{{ route('page.contact') }}" class="{{ request()->routeIs('page.contact') ? '' : '' }}">
        Kontakt
      </x-menu.item>
    </ul>
  </div>
</nav>