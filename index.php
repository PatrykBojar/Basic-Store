<?php
require_once("db/conectar.php");
require_once("controller/productos_controller.php");
require_once("controller/usuarios_controller.php");


if (isset($_GET['controller']) && isset($_GET['action']) ) {

    if ($_GET['controller'] == "productos") {

         if ($_GET['action'] == "show_main_page") {
           $controller = new productos_controller();
           $controller->show_main_page();
         }

         if ($_GET['action'] == "show_manage_product") {
           $controller = new productos_controller();
           $controller->show_manage_product();
         }

         if ($_GET['action'] == "insert") {
           $controller = new productos_controller();
           $controller->insert();
         }

         if ($_GET['action'] == "delete") {
           $controller = new productos_controller();
           $controller->delete();
         }
         if ($_GET['action'] == "sortNombreAsc") {
           $controller = new productos_controller();
           $controller->sortNombreAsc();
         }
         if ($_GET['action'] == "sortNombreDesc") {
           $controller = new productos_controller();
           $controller->sortNombreDesc();
         }
         if ($_GET['action'] == "sortStockAsc") {
           $controller = new productos_controller();
           $controller->sortStockAsc();
         }
         if ($_GET['action'] == "sortStockDesc") {
           $controller = new productos_controller();
           $controller->sortStockDesc();
         }
         if ($_GET['action'] == "sortPriceAsc") {
           $controller = new productos_controller();
           $controller->sortPriceAsc();
         }
         if ($_GET['action'] == "sortPriceDesc") {
           $controller = new productos_controller();
           $controller->sortPriceDesc();
         }

    }

    if ($_GET['controller'] == "usuarios") {

      if ($_GET['action'] == "login") {
        $controller = new usuarios_controller();
        $controller->login();
      }

      if ($_GET['action'] == "logout") {
        $controller = new usuarios_controller();
        $controller->logout();
        $controller->aaa();
      }

      if ($_GET['action'] == "show_login_page") {
        $controller = new usuarios_controller();
        $controller->show_login_page();
      }
    }


} else {
   //$controller = new productos_controller();
   //$controller->view();
   $controller = new usuarios_controller();
   $controller->show_login_page();
}


































 ?>
