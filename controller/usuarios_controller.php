<?php
require_once("model/usuarios_model.php");
require_once("model/order_model.php");

class usuarios_controller {

  public function login(){
    $usuarios = new usuarios_model();
    $usuarios->setUsername($_POST['username']);
    $usuarios->setPassword($_POST['password']);
    $encontrado = $usuarios->valida_usuario();

    if ($encontrado) {
      $_SESSION['user'] = $_POST['username'];

     $order = new order_model();
      $order->get_UserOrder();
           if (!empty($_SESSION['cart'])) {
             $check = $order->check_UserOrder();
             if ($check == "PENDING") {
               $order->reject_prevOrder();
             }
             $order->appendOrder($_SESSION['cart']);
             unset($_SESSION['cart']);
           }
      header('Location: index.php?controller=productos&action=show_start_page');
      exit();
    } else {
    header('Location: index.php?controller=usuarios&action=show_login_page');
      exit();
    }
  }
  // Registrar usuario.
  public function register(){
    $usuarios = new usuarios_model();
    $usuarios->setUsername($_POST['username']);
    $usuarios->setFullname($_POST['fullname']);
    $usuarios->setEmail($_POST['email']);
    $usuarios->setAddress($_POST['address']);
    $usuarios->setZipcode($_POST['zipCode']);
    $usuarios->setPassword($_POST['password']);
    $usuarios->setPasswordCheck($_POST['password_check']);
    if($_POST['password'] == $_POST['password_check']){
      $registrado = $usuarios->crea_usuario();
    }
  if ($registrado) {
      $_SESSION['user'] = $row['USERNAME'];
      header('Location: index.php?controller=productos&action=show_start_page');
      exit();
    } else {
      header('Location: index.php?controller=usuarios&action=show_login_page');
      exit();
    }
  }

  public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?controller=productos&action=show_start_page');
        exit();
      }

  function show_login_page(){
    require_once("view/login/html/login.phtml");
  }
}
?>
