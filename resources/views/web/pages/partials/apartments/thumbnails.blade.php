<section data-view="thumbnails" class="hidden">
  <div class="grid grid-cols-16">
    <div class="col-span-16 lg:col-start-2 lg:col-span-12 grid grid-cols-12 gap-16">
      @foreach($apartments as $a)
        <div 
        class="col-span-6 lg:col-span-3 min-h-[150px] pt-8 border-t border-silver"
        data-filterable
        data-rooms="{{ $a['rooms'] }}"
        data-floor="{{ $a['floor']['order'] }}"
        data-area="{{ $a['area'] }}"
        data-price="{{ $a['price'] }}"
        data-state="{{ $a['state']['order'] }}">
          {{ $a['number'] }}, {{ $a['rooms'] }}
          <figure class="block mt-8">
            <img src="/media/Allreal_Spiserstrasse_8.1.png" class="w-full h-auto" alt="{{ $a['type'] !== 'Atelier' ? $a['rooms'] . ' Zimmer-Wohnung' : 'Atelier' }}, {{ $a['floor']['label'] }}, {{ $a['street'] }}">
          </figure>
        </div>
      @endforeach
    </div>
  </div>
</section>