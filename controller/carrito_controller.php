<?php
require_once("model/productos_model.php");
require_once("model/order_model.php");

class carrito_controller{

function ver_carrito(){
  $carrito = new productos_model();
  require_once("view/main/html/cart_page.phtml");
}








}













 ?>
