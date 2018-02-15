<?php
require_once("db/conectar.php");
require_once("controller/productos_controller.php");
require_once("controller/usuarios_controller.php");
require_once("controller/categorias_controller.php");
require_once("controller/marcas_controller.php");
require_once("controller/imagenes_controller.php");

//require_once("recaptchalib.php");


require_once("config/config.php");

session_start();


if (isset($_GET['controller']) && isset($_GET['action'])) {

    if ($_GET['controller'] == "productos") {

        if ($_GET['action'] == "show_start_page") {
            $controller = new productos_controller();
            $controller->show_start_page();

        }
        if ($_GET['action'] == "show_product_page") {
            $controller = new productos_controller();
            $controller->show_product_page();

        }
        if ($_GET['action'] == "show_login_page") {
            $controller = new productos_controller();
            $controller->show_login_page();
        }

        if ($_GET['action'] == "show_manage_product") {
            $controller = new productos_controller();
            $controller->show_manage_product();
        }

        if ($_GET['action'] == "buscador") {
            $controller = new productos_controller();
            $controller->buscador();
        }
        if ($_GET['action'] == "show_subCatProduct") {
            $controller = new productos_controller();
            $controller->show_subCatProduct();
        }
        if ($_GET['action'] == "insert") {
            $controller = new productos_controller();
            $controller->insert();
        }
        if ($_GET['action'] == "delete") {
            $controller = new productos_controller();
            $controller->delete();
        }
        if ($_GET['action'] == "create_promotion") {
            $controller = new productos_controller();
            $controller->create_promotion();
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
        if ($_GET['action'] == "sortBrandAsc") {
            $controller = new productos_controller();
            $controller->sortBrandAsc();
        }
        if ($_GET['action'] == "sortBrandDesc") {
            $controller = new productos_controller();
            $controller->sortBrandDesc();
        }

/*
CONTROLADORES NECESARIO EN CASO DE USAR UNA PÁGINA CON BOTONES DE ELECCIÓN.
        if ($_GET['action'] == "show_insert_page") {
          $controllerCtg = new categorias_controller();
          $controllerCtg->list_categories();
          $controller = new productos_controller();
          //$controller->show_product_list();
          $controller->show_eleccion();
        }
        if ($_GET['action'] == "show_update_page") {
            $controller = new productos_controller();
            $controller->show_product_list();
        }
        if ($_GET['action'] == "show_delete_page") {
            $controller = new productos_controller();
            $controller->show_product_list();
        }
*/
    }

    if ($_GET['controller'] == "usuarios") {

        if ($_GET['action'] == "login") {
            $controller = new usuarios_controller();
            $controller->login();
        }

        if ($_GET['action'] == "logout") {
            $controller = new usuarios_controller();
            $controller->logout();
        }

        if ($_GET['action'] == "show_login_page") {
            $controller = new usuarios_controller();
            $controller->show_login_page();
        }

        if ($_GET['action'] == "register") {
            $controller = new usuarios_controller();
            $controller->register();
        }
    }

    if ($_GET['controller'] == "categorias") {

        if ($_GET['action'] == "insert_category") {
            $controller = new categorias_controller();
            $controller->insert_category();
        }

        if ($_GET['action'] == "insert_subCategory") {
            $controller = new categorias_controller();
            $controller->insert_subCategory();
        }

        if ($_GET['action'] == "delete_category") {
            $controller = new categorias_controller();
            $controller->delete_category();
        }
        if ($_GET['action'] == "delete_subCategory") {
            $controller = new categorias_controller();
            $controller->delete_subCategory();
        }
        if ($_GET['action'] == "list_categories") {
            $controller = new categorias_controller();
            $controller->list_categories();
        }
    }



    if ($_GET['controller'] == "imagenes") {
    if ($_GET['action'] == "insert_image") {
        $controller = new imagenes_controller();
        $controller->insert_image();
    }
}

} else {
    //$controller = new productos_controller();
    //$controller->view();
    $controller = new productos_controller();
    $controller->show_start_page();
}


































?>
