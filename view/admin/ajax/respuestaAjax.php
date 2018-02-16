<?php

// Muestra el precio final dependiendo del descuento y el producto.
// // Si el valor es vacío, menor de 1 o superior a 99 saldrá un mensaje de aviso.
if ($_GET['descuento'] == "" || $_GET['descuento'] < 1 || $_GET['descuento'] > 99){
  echo "<small>Esperando un valor correcto...</small>";
}else{
  // Si el valor es correcto se mostrará un mensaje con el precio final (descuento incluido).
    echo "<small>El precio final, incluido el descuento, será de: " . round(($_GET['precio']  * (1-$_GET['descuento']/100)),2). " €" . "</small>";
}
 ?>
