@include('pdf.partials.header')
<div class="page">
  <table class="page-info">
    <tr>
      <td class="page-info__left">
        Marcel Stadelmann<br>
        Letzigraben 149<br>
        8047 Zürich
      </td>
    </tr>
  </table>
  <h1 class="page__title">Preisliste</h1>
  <div class="page__date">Zürich, {{date('d.m.Y', time())}}</div>
  <div class="page__content">
    <table class="content-table">
      <thead>

      </thead>
      <tbody>
        <tr>
          <td style="width: 80mm"><strong>Blender Einführungskurs</strong></td>
          <td style="width: 28mm">28.04.2022</td>
          <td style="width: 31mm">02-280422</td>
          <td style="width: 25mm">besucht</td>
        </tr>
        <tr>
          <td><strong>Visual Storytelling</strong></td>
          <td>01.06.2022</td>
          <td>03-010622</td>
          <td>besucht</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@include('pdf.partials.footer')