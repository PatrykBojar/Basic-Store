<?php
require_once("model/productos_model.php");

class productos_controller {

    function show_manage_product() {
        require_once("view/admin/productos_manage.phtml");
    }
    // Mostramos la página principal?????????
    // O de alguna forma mostramos solo los productos???y
    function show_main_page() {
        $product = new productos_model();
        $datos   = $product->get_products();
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
            } else {
                echo $error;
            }
        }
    }

    function delete() {
        if (isset($_GET['id'])) {
            $product = new productos_model();
            $id      = $_GET['id'];

            $error = $product->delete_product($id);

            if (!$error) {
                header("Location: index.php");
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
