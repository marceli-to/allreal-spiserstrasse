<nav 
  class="bg-white bg-opacity-95 min-h-full absolute top-0 left-0 pl-16 z-50 pt-20 lg:pt-0 hidden w-[50%] lg:w-[calc(25%-1rem)] max-w-[calc(320px-1rem)]"
  data-menu>
  <div class="lg:grid lg:grid-cols-4">
    <a href="javascript:;" class="block ml-1 lg:mt-38 lg:col-span-1" data-menu-toggle title="Menü verbergen">
      @include('web.icons.cross')
    </a>
    <ul class="mt-42 lg:mt-0 lg:pt-33 lg:ml-6 lg:col-span-3">
      <x-menu-item href="{{ route('page.project') }}" class="{{ request()->routeIs('page.project') ? '' : '' }}">
        Projekt
      </x-menu-item>
      {{-- <x-menu-item href="{{ route('page.location') }}" class="{{ request()->routeIs('page.location') ? '' : '' }}">
        Lage
      </x-menu-item> --}}
      <x-menu-item href="{{ route('page.apartments') }}" class="{{ request()->routeIs('page.apartments') ? '' : '' }}">
        Objekte
      </x-menu-item>
      <x-menu-item href="{{ route('page.features') }}" class="{{ request()->routeIs('page.features') ? '' : '' }}">
        Ausstattung
      </x-menu-item>
      <x-menu-item href="{{ route('page.gallery') }}" class="{{ request()->routeIs('page.gallery') ? '' : '' }}">
        Galerie
      </x-menu-item>
      <x-menu-item href="{{ route('page.round-tour') }}" class="{{ request()->routeIs('page.round-tour') ? '' : '' }}">
        360°-Rundgang
      </x-menu-item>
      <x-menu-item href="{{ route('page.contact') }}" class="{{ request()->routeIs('page.contact') ? '' : '' }}">
        Kontakt
      </x-menu-item>
    </ul>
  </div>
</nav>