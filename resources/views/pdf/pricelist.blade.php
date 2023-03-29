@include('pdf.partials.header')
@php
  $apartments8 = $data->filter(function ($value, $key) {
    return preg_match('/^8/', $value->number);
  });
  $apartments10 = $data->filter(function ($value, $key) {
    return preg_match('/^10/', $value->number);
  });
  $apartments12 = $data->filter(function ($value, $key) {
    return preg_match('/^12/', $value->number);
  });
@endphp
<div class="page">
  <div class="page__title">Preisliste Eigentumswohnungen, Townhouses und Ateliers Spiserstrasse 8, Zürich</div>
  <div class="page__content">
    <table class="content-table">
      <tr>
        <td class="heading underline">Nr.</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Zimmer</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Geschoss</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Fläche m<sup>2</sup></td>
        <td class="heading spacer"></td>
        <td class="heading underline">Status</td>
        <td class="heading spacer"></td>
        <td class="heading underline align-right price">Kaufpreis</td>
      </tr>
      @foreach($apartments8 as $a)
        <tr>
          <td class="item underline">{{ $a->number }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->rooms }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ collect($a->floors->pluck('acronym')->all())->implode(', ') }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->area }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->state == 'sold' ? 'verkauft' : ($a->state == 'reserved' ? 'reserviert' : 'frei') }}</td>
          <td class="item spacer"></td>
          <td class="item underline align-right price">{{ number_format($a->price , 2, ".", "\u{2009}") }}</td>
        </tr>
      @endforeach
      @include('pdf.partials.parking')
    </table>

  </div>
  <div class="break"></div>
  <div class="page__title">Preisliste Eigentumswohnungen, Townhouses und Ateliers Spiserstrasse 10, Zürich</div>
  <div class="page__content">
    <table class="content-table">
      <tr>
        <td class="heading underline">Nr.</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Zimmer</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Geschoss</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Fläche m<sup>2</sup></td>
        <td class="heading spacer"></td>
        <td class="heading underline">Status</td>
        <td class="heading spacer"></td>
        <td class="heading underline align-right price">Kaufpreis</td>
      </tr>
      @foreach($apartments10 as $a)
        <tr>
          <td class="item underline">{{ $a->number }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->rooms }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ collect($a->floors->pluck('acronym')->all())->implode(', ') }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->area }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->state == 'sold' ? 'verkauft' : ($a->state == 'reserved' ? 'reserviert' : 'frei') }}</td>
          <td class="item spacer"></td>
          <td class="item underline align-right price">{{ number_format($a->price , 2, ".", "\u{2009}") }}</td>
        </tr>
      @endforeach
      @include('pdf.partials.parking')
    </table>
  </div>
  <div class="break"></div>
  <div class="page__title">Preisliste Eigentumswohnungen, Townhouses und Ateliers Spiserstrasse 12, Zürich</div>
  <div class="page__content">
    <table class="content-table">
      <tr>
        <td class="heading underline">Nr.</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Zimmer</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Geschoss</td>
        <td class="heading spacer"></td>
        <td class="heading underline">Fläche m<sup>2</sup></td>
        <td class="heading spacer"></td>
        <td class="heading underline">Status</td>
        <td class="heading spacer"></td>
        <td class="heading underline align-right price">Kaufpreis</td>
      </tr>
      @foreach($apartments12 as $a)
        <tr>
          <td class="item underline">{{ $a->number }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->rooms }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ collect($a->floors->pluck('acronym')->all())->implode(', ') }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->area }}</td>
          <td class="item spacer"></td>
          <td class="item underline">{{ $a->state == 'sold' ? 'verkauft' : ($a->state == 'reserved' ? 'reserviert' : 'frei') }}</td>
          <td class="item spacer"></td>
          <td class="item underline align-right price">{{ number_format($a->price , 2, ".", "\u{2009}") }}</td>
        </tr>
      @endforeach
      @include('pdf.partials.parking')
    </table>
  </div>
</div>
@include('pdf.partials.footer')