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
        $category = new categorias_model();
        $categories   = $category->get_categories();
        $subCategory = new categorias_model();
        $subCategories   = $category->get_subCategories();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }

    function show_product_page() {
      $product = new productos_model();
      $datos   = $product->productRealInfo();
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
      $images = new productos_model();
      $images = $images->productPageImg();
      $id      = $_GET['id'];
      $subCatId      = $_GET['sc'];
        /*$subCatPrd = new categorias_model();
        $subCatPrd   = $category->show_subCatUl($id);*/
        require_once("view/main/html/product_page.phtml");
    }

    function insert() {
        $product = new productos_model();

            $product->setName($_POST['name']);
            $product->setStock(aInt($_POST['stock']));
            $product->setPrice(aInt($_POST['price']));
            $product->setSponsored($_POST['sponsored']);
            $product->setShrtDesc($_POST['shortDesc']);
            $product->setLngDesc($_POST['longDesc']);
            $product->setBrand(aInt($_POST['brand']));
            $product->setCategory(aInt($_POST['subcateogry']));

            $error = $product->insert_product();

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
            }
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

    function create_promotion() {
        if (isset($_GET['ID'])) {
            $product = new productos_model();
            $id      = $_GET['ID'];
            $product->setDiscount($_POST['prmDis']);
            $product->setDay($_POST['prmday']);
            $product->setMonth($_POST['prmmth']);
            $product->setYear($_POST['prmyr']);

            $error = $product->create_promotion($id);

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
            }
        }
    }

    function sortNombreAsc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortNombreAsc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }
    function sortNombreDesc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortNombreDesc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }

    function sortStockAsc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortStockAsc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }
    function sortStockDesc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortStockDesc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }

    function sortPriceAsc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortPriceAsc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }
    function sortPriceDesc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortPriceDesc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }

    function sortBrandAsc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortBrandAsc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }
    function sortBrandDesc() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
        $product = new productos_model();
        $datos   = $product->sortBrandDesc();
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        require_once("view/main/html/main_page.phtml");
    }

    function show_subCatProduct(){
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
      $product = new productos_model();
      $images = new productos_model();
      $images   = $images->showProductImg();
      $carrouselImg = new productos_model();
      $carrouselImg   = $carrouselImg->showCarrouselImg();
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
        $images = new productos_model();
        $images   = $images->showProductImg();
        $carrouselImg = new productos_model();
        $carrouselImg   = $carrouselImg->showCarrouselImg();
        $name = $_POST['name'];
        $datos   = $product->buscador($name);
        require_once("view/main/html/main_page.phtml");
    }

}
?>
