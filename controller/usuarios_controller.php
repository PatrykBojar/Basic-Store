<?php
require_once("model/usuarios_model.php");
// ESTA CLASE NECESITA MEJORAS Y COMPROBACIONES
// GUARDAR EL USUARIO EN LA VARIABLE $_SESSION, etc
class usuarios_controller {
  public function aaa(){
  session_start();
  if(!isset($_SESSION["user"])){
    header('Location: index.php?controller=usuarios&action=show_login_page');
  }else{
    $user=$_SESSION["user"];
  }
}
  public function login(){
    $usuarios = new usuarios_model();
    $usuarios->setUsername($_POST['username']);
    $usuarios->setPassword($_POST['password']);
    $encontrado = $usuarios->valida_usuario();
    if ($encontrado) {
      session_start();
      header('Location: index.php?controller=productos&action=show_main_page');
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
    $usuarios->setPassword($_POST['password']);
    $encontrado = $usuarios->crea_usuario();
    if ($encontrado) {
      header('Location: index.php?controller=productos&action=show_main_page');
    } else {
      header('Location: index.php?controller=usuarios&action=show_login_page');
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
