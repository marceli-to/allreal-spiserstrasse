<script type="text/php">
  if ( isset($pdf) ) {
    $date = date('d.m.Y', time());
    $font = $fontMetrics->get_font("DinLight", "normal");
    $pdf->page_text(546, 807, "{PAGE_NUM}/{PAGE_COUNT}", $font, 8, array(0,0,0));
  }
</script>
</body>
</html>