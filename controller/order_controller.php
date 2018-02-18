<?php
require_once("model/order_model.php");

class order_controller {

  public function add_to_cart($id){
    $id = $_GET['id'];
    $product = new order_model();
    $nr_units = 1;
    $exists = false;
    $row = $product->get_cart_items($id);

    $item = array(array('NAME'=>$row["NAME"], 'SHORT'=>$row["SHORTDESCRIPTION"],
        'ID'=>$row["ID"], 'QUANTITY'=>$nr_units, 'PRICE'=>$row["PRICE"], 'URL'=>$row['URL']));

    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $dato => $value) {
        foreach ($_SESSION['cart'] as $datoCart2 => $value2) {
          if ("ID" == $datoCart2) {
            if ($id == $value2) {
              $exists = true;
              $exists = false;
              $_SESSION['cart'][$dato]['QUANTITY'] += $nr_units;
            }
          }
        }
      }
      if (!$exists) {
        $_SESSION['cart'] = array_merge($_SESSION['cart'],$item);
      }
    }else{
      $_SESSION['cart'] = $item;
    }
    header("Location: index.php");
    exit();
  }

  public function empty_cart(){
    unset($_SESSION['cart']);
    header("Location: index.php?controller=carrito&action=ver_carrito");
    exit();
  }

  public function remove_cart_items($id){
    $id = $_GET['id'];
    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $dato => $value) {
        foreach ($_SESSION['cart'][$dato] as $datoCart2 => $value2) {
          if ("ID" == $datoCart2) {
            if ($id == $value2) {
              unset($_SESSION['cart'][$dato]);
            }
          }
        }
      }
    }
    header("Location: index.php?controller=carrito&action=ver_carrito");
    exit();
  }
}
 ?>
