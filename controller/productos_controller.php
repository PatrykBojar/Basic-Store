<?php
require_once("model/productos_model.php");

class productos_controller {

    function show_manage_product() {
        require_once("view/admin/html/productos_manage.phtml");
    }

    /*
FUNCIÓN PARA MOSTRAR LA PÁGINA DE LA ELECCIÓN CON BOTONES
(INSERTA, MODIFICAR, ELIMIANR)
    function show_eleccion() {
        require_once("view/admin/html/insertar_producto.phtml");
    }*/


    // Mostramos la página principal?????????
    // O de alguna forma mostramos solo los productos???y
    function show_main_page() {
        $product = new productos_model();
        $datos   = $product->get_products();
        require_once("view/main/html/main_page.phtml");
    }

    function show_product_list() {
        $product = new productos_model();
        $datos   = $product->get_products();
        require_once("view/admin/html/productos_manage.phtml");
    }
    function ver_mas_alpha() {
      // faltaría el get del ID para mostrar solo la descripcioón larga
      // del producto clicado.
        $product = new productos_model();
        // ??? $product->getId();
        $datos   = $product->get_products();

        require_once("view/main/html/main_page_desc.phtml");
    }

    function show_sponsored_products(){
      $product = new productos_model();
      $datos   = $product->showSponsoredProducts();
      require_once("view/main/html/main_page.phtml");
    }

    function insert() {
        $product = new productos_model();

        if (isset($_POST['insert'])) {
            $product->setName($_POST['name']);
            $product->setStock($_POST['stock']);
            $product->setPrice($_POST['price']);
            $product->setSponsored($_POST['sponsored']);
            $product->setShrtDesc($_POST['shortDesc']);
            $product->setLngDesc($_POST['longDesc']);
            $product->setBrand($_POST['brand']);
            $product->setCategory($_POST['category']);

            $error = $product->insert_product();

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
            }
        }
    }
    function update(){
      $product = new productos_model();
    }

    function delete() {
        if (isset($_GET['ID'])) {
            $product = new productos_model();
            $id      = $_GET['ID'];

            $error = $product->delete_product($id);

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
            }
        }
    }

    function sortNombreAsc() {
        $product = new productos_model();
        $datos   = $product->sortNombreAsc();
        require_once("view/main/html/main_page.phtml");
    }
    function sortNombreDesc() {
        $product = new productos_model();
        $datos   = $product->sortNombreDesc();
        require_once("view/main/html/main_page.phtml");
    }

    function sortStockAsc() {
        $product = new productos_model();
        $datos   = $product->sortStockAsc();
        require_once("view/main/html/main_page.phtml");
    }
    function sortStockDesc() {
        $product = new productos_model();
        $datos   = $product->sortStockDesc();
        require_once("view/main/html/main_page.phtml");
    }

    function sortPriceAsc() {
        $product = new productos_model();
        $datos   = $product->sortPriceAsc();
        require_once("view/main/html/main_page.phtml");
    }
    function sortPriceDesc() {
        $product = new productos_model();
        $datos   = $product->sortPriceDesc();
        require_once("view/main/html/main_page.phtml");
    }

}
?>
