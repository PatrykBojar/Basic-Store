<?php
require_once("model/usuarios_model.php");

// ESTA CLASE NECESITA MEJORAS Y COMPROBACIONESd
// GUARDAR EL USUARIO EN LA VARIABLE $_SESSION, etc
class usuarios_controller {


/*  public function aaa(){
  session_start();
  if(!isset($_SESSION["user"])){
    header('Location: index.php?controller=usuarios&action=show_login_page');
  }else{
    $user=$_SESSION["user"];
  }
}*/
  public function login(){
    $usuarios = new usuarios_model();
    $usuarios->setUsername($_POST['username']);
    $usuarios->setPassword($_POST['password']);
    $encontrado = $usuarios->valida_usuario();
    if ($encontrado) {
      $_SESSION['user'] = $_POST['username'];
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
    $registrado = $usuarios->crea_usuario();
    //$encontrado = $usuarios->valida_usuario();
  if (/*$registrado || */$encontrado) {
      $_SESSION['user'] = $row['USERNAME'];
      header('Location: index.php?controller=productos&action=show_start_page');
      exit();
    } else {
      header('Location: index.php?controller=usuarios&action=show_login_page');
      exit();
    }
  }

// MAL, LA SESIÓN SIGUE GUARDADA. USAR $_SESSION.
  public function logout(){
        session_start();
        session_destroy();
        header('Location: index.php?controller=usuarios&action=show_login_page');
        exit();
      }

  function show_login_page(){
    require_once("view/login/html/login.phtml");
  }

}
?>
