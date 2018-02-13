<?php
define("IVA", 21);
define("YEAR", date("Y"));
define("MONTH", date("m"));
define("DAY", date("d"));
setlocale(LC_MONETARY,"es_ES");

function enEuro($value) {
  $val = str_replace(' ', '', $value);
  return number_format($val, 2) . ' €';
}
function aInt($value){
  return (float)(str_replace(' ', '', $value));
}

 ?>
