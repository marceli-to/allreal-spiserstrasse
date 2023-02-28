<section data-view="thumbnails" class="hidden">
  <div class="grid grid-cols-16">
    <div class="col-span-16 lg:col-start-2 lg:col-span-12 grid grid-cols-12 gap-16">
      @foreach($apartments as $a)
        <div 
        class="col-span-6 lg:col-span-3 min-h-[150px] p-8 border border-silver"
        data-filterable
        data-rooms="{{ $a['rooms'] }}"
        >
          {{ $a['number'] }}, {{ $a['rooms'] }}
        </div>
      @endforeach
    </div>
  </div>
</section>