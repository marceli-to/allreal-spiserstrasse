<style>
@font-face {
  font-family: 'DinLight';
  src: url('{{ url("/") }}/fonts/din-light.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

@font-face {
  font-family: 'DinMedium';
  src: url('{{ url("/") }}/fonts/din-medium.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

@font-face {
  font-family: 'DinRegular';
  src: url('{{ url("/") }}/fonts/din-regular.ttf') format("truetype");
  font-weight: normal;
  font-style: normal; 
}

body {
  color: #000000;
  font-size: 10pt;
  font-family: 'din-light', Helvetica, Arial, sans-serif;
  font-weight: normal;
  line-height: 1;
  text-rendering: optimizeLegibility;
}

strong {
  font-family: 'din-medium', Helvetica, Arial, sans-serif;
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
  font-family: 'din-light', Helvetica, Arial, sans-serif;
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

h1, h2, h3 {
  font-family: 'din-medium', Helvetica, Arial, sans-serif;
}

h1 {
  color: #000000;
  font-family: 'din-light', Helvetica, Arial, sans-serif;
  font-size: 18pt;
  line-height: 22pt;

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

.page__title,
.page__content {
  left: 0;
  position: absolute;
}


.page__title {
  font-size: 16pt;
  font-family: 'din-medium', Helvetica, Arial, sans-serif;
  font-weight: normal;
  line-height: .9;
  top: 85mm;
}


.page__content {
  padding-top: 124mm;
  top: 0;
  width: 168mm;
}

.content-table {
  margin-bottom: 10mm;
  width: 100%;
}

.content-table tbody tr:first-of-type,
.content-table thead {
  border-bottom: .1mm solid #000000;
}

.content-table td:first-child {
  width: 36mm;
}

.content-table th, 
.content-table td {
  padding: 1mm 0 2mm 0;
}

.content-table tr {
  border-bottom: .1mm solid #000000;
}

</style>