<div class="grid grid-cols-16">
  <div class="col-span-16 lg:col-start-2 lg:col-span-12 grid grid-cols-12 gap-16">
    @foreach($apartments as $a)
      <a
        href="{{ route('page.apartment', ['slug' => $a->slug, 'apartment' => $a->id]) }}" 
        class="col-span-12 md:col-span-6 lg:col-span-3 min-h-[260px] pt-8 border-t border-silver md:hover:text-blue"
        data-filterable
        data-thumb-item
        data-number="{{ $a->number }}"
        data-rooms="{{ $a->rooms }}"
        data-type="{{ $a->type->id }}"
        data-floor="{{ $a->floorArray['order'] }}"
        data-area="{{ $a->area }}"
        data-price="{{ $a->price }}"
        data-state="{{ $a->stateArray['order'] }}"
        title="Wohnung {{ $a->number }} anzeigen" >
        Wohnung {{ $a->number }}
        <figure class="block mt-8">
          <img 
            src="/media/plans/sm/Allreal_Spiserstrasse_{{ $a->number }}.png" 
            class="w-full h-auto" 
            alt="{{ $a['type'] !== 'Atelier' ? $a->rooms . ' Zimmer-Wohnung' : 'Atelier' }}, {{ $a->floorArray['label'] }}, {{ $a->street }}"
            width="200"
            height="250">
        </figure>
      </a>
    @endforeach
  </div>
</div>
