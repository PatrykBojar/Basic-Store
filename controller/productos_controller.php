<?php
require_once("model/productos_model.php");
require_once("model/marcas_model.php");
require_once("model/categorias_model.php");


class productos_controller {

    function show_manage_product() {
      $product = new productos_model();
      $datos   = $product->get_products();
      $brand = new marcas_model();
      $brands   = $brand->get_brands();
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
      $notSponsoredPrd = new productos_model();
      $notSponsoredPrd = $notSponsoredPrd->showNotSponsoredProducts();
      require_once("view/admin/html/productos_manage.phtml");

    }

    /*
FUNCIÓN PARA MOSTRAR LA PÁGINA DE LA ELECCIÓN CON BOTONES
(INSERTA, MODIFICAR, ELIMIANR)
    function show_eleccion() {
        require_once("view/admin/html/insertar_producto.phtml");
    }*/


    // Mostramos la página principal?????????
    // O de alguna forma mostramos solo los productos???
    function show_start_page() {
        $product = new productos_model();
        $datos   = $product->showSponsoredProducts();
        //echo '<pre>',print_r($datos ,1),'</pre>';
        $category = new categorias_model();
        $categories   = $category->get_categories();
        $subCategory = new categorias_model();
        $subCategories   = $category->get_subCategories();
        require_once("view/main/html/main_page.phtml");
    }

    /*function show_product_list() {
        $product = new productos_model();
        $datos   = $product->get_products();
        require_once("view/admin/html/productos_manage.phtml");
    }*/

    function insert() {
        $product = new productos_model();

            $product->setName($_POST['name']);
            $product->setStock(aInt($_POST['stock']));
            $product->setPrice(aInt($_POST['price']));
            $product->setSponsored($_POST['sponsored']);
            $product->setShrtDesc($_POST['shortDesc']);
            $product->setLngDesc($_POST['longDesc']);
            $product->setBrand(aInt($_POST['brand']));
            $product->setCategory(aInt($_POST['category']));

            $error = $product->insert_product();

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
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
    function show_subCatProduct(){
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
      $product = new productos_model();
      $name = $_GET['NAME'];
      $datos   = $product->show_subCatProduct($name);
      require_once("view/main/html/main_page.phtml");
    }

    function buscador() {
        $category = new categorias_model();
        $categories   = $category->get_categories();
        $subCategory = new categorias_model();
        $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $name = $_POST['name'];
        $datos   = $product->buscador($name);
        require_once("view/main/html/main_page.phtml");
    }

    /*function precioDescontado(){
      $product = new productos_model();
      $datos   = $product->precio();
      $precioDescontado
    }*/

}
?>
