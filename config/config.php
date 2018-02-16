<?php
/**
 * Contiene constantes y funciones globales que se usarán en todo el proyecto.
 **/

 // Variables que guardan el IVA y la fecha actual (día, mes, año...).
define("IVA", 21);
define("YEAR", date("Y"));
define("MONTH", date("m"));
define("DAY", date("d"));
define("HOUR", date("H"));
define("MINUTE", date("i"));
define("SECOND", date("s"));

// Establece la moneda, en este caso el euro.
setlocale(LC_MONETARY,"es_ES");

/**
 * Convierte el valor pasado a un formato de moneda correcto.
 * @param  float $value precio de cualquier objeto.
 * @return string cadena de caracteres con el precio y el símbolo del euro.
 */
function enEuro($value) {
  $val = str_replace(' ', '', $value);
  return number_format($val, 2) . ' €';
}
/**
 * Convierte un string a float.
 * @param  mixed $value valor númerico en cualquier formato.
 * @return float número en formato float.
 */
function aFloat($value){
  return (float)(str_replace(' ', '', $value));
}
/**
* Convierte un string a integer.
* @param  mixed $value valor númerico en cualquier formato.
* @return float número en formato integer.
 */
function aInt($value){
  return (int)(str_replace(' ', '', $value));
}

 ?>
