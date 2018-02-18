<?php
require_once("model/usuarios_model.php");
require_once("model/order_model.php");
/**
 * Maneja las sesiones: inicio, registro y cerrar la sesión.
 */
class usuarios_controller {
    /**
     * Inicia la sesión del usuario
     */
    public function login() {
        $usuarios = new usuarios_model();
        // Obtenemos los valores para iniciar sesión.
        $usuarios->setUsername($_POST['username']);
        $usuarios->setPassword($_POST['password']);
        // Validamos sesión.
        $encontrado = $usuarios->valida_usuario();

        // Si el usuario es encontrado en la base de datos...
        if ($encontrado) {
            // Creamos la sesión con el nombre del usuario.
            $_SESSION['user'] = $_POST['username'];

            $order = new order_model();
            $order->get_UserOrder();
            // Si la cesta no está vacía comprobamos si el estado está en PENDING.
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
    /**
     * Registra al usuario.
     */
    public function register() {
        $usuarios = new usuarios_model();
        $usuarios->setUsername($_POST['username']);
        $usuarios->setFullname($_POST['fullname']);
        $usuarios->setEmail($_POST['email']);
        $usuarios->setAddress($_POST['address']);
        $usuarios->setZipcode($_POST['zipCode']);
        $usuarios->setPassword($_POST['password']);
        $usuarios->setPasswordCheck($_POST['password_check']);
        if ($_POST['password'] == $_POST['password_check']) {
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
/**
 * Cierra la sesión.
 */
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?controller=productos&action=show_start_page');
        exit();
    }
/**
 * Muestra la página del login.
 */
    function show_login_page() {
        require_once("view/login/html/login.phtml");
    }
}
?>
