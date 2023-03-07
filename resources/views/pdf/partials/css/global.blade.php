<style>
@font-face {
  font-family: 'DinLight';
  src: url('{{ url("/") }}/fonts/din-light.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

@font-face {
  font-family: 'DinMedium';
  src: url('{{ url("/") }}/fonts/din-light.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

@font-face {
  font-family: 'DinRegular';
  src: url('{{ url("/") }}/fonts/din-light.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

body {
  color: #000000;
  font-size: 9pt;
  font-family: 'DinLight', Helvetica, Arial, sans-serif;
  font-weight: normal;
  line-height: 1;
  text-rendering: optimizeLegibility;
}

strong {
  font-family: 'DinMedium', Helvetica, Arial, sans-serif;
  font-weight: normal;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

td {
  padding: 0;
  vertical-align: top;
}

th {
  font-family: 'DinLight', Helvetica, Arial, sans-serif;
  font-weight: normal;
  text-align: left;
}

img {
  border: 0;
  vertical-align: middle;
}

table {
  width: 100%;
}

table td {
  text-align: left;
  vertical-align: top;
}

p {
  margin-bottom: 5mm;
}

ul, li {
  margin: 0;
  padding: 0;
}

li {
  margin-left: 4mm;
}

sup {
  font-size: 6pt;
}

/* Helpers */
.align-right {
  text-align: right;
}

.align-left {
  text-align: left;
}

.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}

/* Header */
.header {
  display: inline-block;
  height: 16mm;
  left: 0;
  position: fixed;
  top: 10mm;
  width: 168mm;
  z-index: 100;
}

.header img {
  display: block;
  height: auto;
  width: 100%;
}

.footer {
  bottom: -2mm;
  position: fixed;
  z-index: 100;
}

.break {
  page-break-after: always;
}

.page {
  margin-top: 0;
  position: relative;
  width: 168mm;
  z-index: 100;
}

.page__title {
  color: #000000;
  font-family: 'DinLight', Helvetica, Arial, sans-serif;
  font-size: 18pt;
  line-height: 1;
  position: absolute;
}

.page__content {
  left: 0;
  position: absolute;
}

.page__content {
  top: 28mm;
  width: 174mm;
}

.content-table {
  width: 100%;
}

.content-table td {
  display: table-cell;
  font-family: 'DinRegular', Helvetica, Arial, sans-serif;
  width: 23mm;
}

.content-table td.spacer {
  width: 5.5mm;
}

.content-table td.price {
  width: 38mm;
}

.content-table td.heading {
  padding-bottom: 2mm;
}

.content-table td.item {
  padding: 1.75mm 0;
}

.content-table td.heading.underline {
  border-bottom: .1mm solid #000000;
}

.content-table td.item.underline {
  border-bottom: .1mm solid #c8c8c8;
}

</style>