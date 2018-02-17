<?php
require_once("model/productos_model.php");
require_once("model/marcas_model.php");
require_once("model/categorias_model.php");

/**
 * Trabaja con productos, todo lo que sea mostrar, modificar, añadir, etc, productos se hace en esta clase.
 */
class productos_controller {
    /**
     * Muestra la página del administrador.
     */
    function show_manage_product() {
        $product         = new productos_model();
        $datos           = $product->get_products();
        $productId       = new productos_model();
        $productId       = $productId->getMaxIdProduct();
        $brand           = new marcas_model();
        $brands          = $brand->get_brands();
        $category        = new categorias_model();
        $categories      = $category->get_categories();
        $subCategory     = new categorias_model();
        $subCategories   = $category->get_subCategories();
        $notSponsoredPrd = new productos_model();
        $notSponsoredPrd = $notSponsoredPrd->showNotSponsoredProducts();
        $allImages       = new imagenes_model();
        $allImages       = $allImages->get_img();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/admin/html/productos_manage.phtml");

    }

    /*
    FUNCIÓN PARA MOSTRAR LA PÁGINA DE LA ELECCIÓN CON BOTONES
    (INSERTA, MODIFICAR, ELIMIANR)
    function show_eleccion() {
    require_once("view/admin/html/insertar_producto.phtml");
    }*/


    /**
     * Muestra la página principal con los productos promocionados y con descuento.
     */
    function show_start_page() {
        $product       = new productos_model();
        $datos         = $product->showSponsoredProducts();
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();
        $mostrarCarr   = true;
        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Muestra la página individual de cada producto.
     */
    function show_product_page() {
        $product       = new productos_model();
        $datos         = $product->productRealInfo();
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $images        = new productos_model();
        $images        = $images->productPageImg();
        $id            = $_GET['id'];
        $subCatId      = $_GET['sc'];

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/product_page.phtml");

    }
    /**
     * Inserta un producto a la base de datos.
     */
    function insert() {
        $product = new productos_model();

        $product->setName($_POST['name']);
        $product->setStock(aInt($_POST['stock']));
        $product->setPrice(aFloat($_POST['price']));
        $product->setSponsored($_POST['sponsored']);
        $product->setShrtDesc($_POST['shortDesc']);
        $product->setLngDesc($_POST['longDesc']);
        $product->setBrand(aInt($_POST['brand']));
        $product->setCategory(aInt($_POST['subcategory']));

        $error = $product->insert_product();

        if (!$error) {
            header("Location: index.php");
            exit();
        } else {
            echo $error;
        }
    }
    /**
     * Elimina un producto de la base de datos. (no quita productos con claves foráneas). Versión BETA.
     */
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
    /**
     * Crea una promoción para el producto seleccionado.
     */
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

    /**
     * Ordena los productos por nombre ascendente.
     */
    function sortNombreAsc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortNombreAsc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por nombre descendente.
     */
    function sortNombreDesc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortNombreDesc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por stock ascendente.
     */
    function sortStockAsc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortStockAsc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por nombre descendente.
     */
    function sortStockDesc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortStockDesc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por precio ascendente.
     */
    function sortPriceAsc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortPriceAsc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por nombre descendente.
     */
    function sortPriceDesc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortPriceDesc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por marca ascendente.
     */
    function sortBrandAsc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortBrandAsc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Ordena los productos por nombre descendente.
     */
    function sortBrandDesc() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $datos         = $product->sortBrandDesc();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $_SESSION['filtro_cat'] = NULL;

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Muestra los productos por cada subcategoría (menú).
     */
    function show_subCatProduct() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $name                   = $_GET['NAME'];
        $_SESSION['filtro_cat'] = $name;

        $datos = $product->show_subCatProduct($name);

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Muestra los productos dependiendo de valor introduciso por el usuario.
     */
    function buscador() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();

        $name  = $_POST['name'];
        $datos = $product->buscador($name);

        $_SESSION['filtro_cat'] = NULL;

        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        require_once("view/main/html/main_page.phtml");
    }
    /**
     * Filtra los productos que tienen asignada una marca y que por marca y precio.
     */
    function filterProductsBrands() {
        $category      = new categorias_model();
        $categories    = $category->get_categories();
        $subCategory   = new categorias_model();
        $subCategories = $category->get_subCategories();
        $product       = new productos_model();
        $images        = new productos_model();
        $images        = $images->showProductImg();
        $carrouselImg  = new productos_model();
        $carrouselImg  = $carrouselImg->showCarrouselImg();
        $maxMin        = new productos_model();
        $maxMin        = $maxMin->minMaxPrice();
        $brandsWithPrd = new marcas_model();
        $brandsWithPrd = $brandsWithPrd->BrandsWithPrd();

        $cont        = 0;
        $filtroQuery = "";

        // Se ha especificado SOLO la marca, sin el precio.
        if (isset($_POST['filtro']) && $_POST['maxPrice'] == '') {
            $idBrand = $_POST['filtro'];

            $_SESSION['filtro_brand'] = $idBrand;

            foreach ($idBrand as $brandCont) {
                if ($cont == 0) {
                    // El usuario ya ha buscado un producto por subcategoría y ahora quiere hacer un filtro.
                    if (isset($_SESSION['filtro_cat'])) {
                        $catt        = $_SESSION['filtro_cat'];
                        $filtroQuery = " prd.BRAND = " . $brandCont . " AND cat.NAME = '$catt'";
                    }
                    // El usuario aún no ha buscado ningún producto por subcategoría y se ejecuta el filtro general.
                    else {
                        $filtroQuery = " prd.BRAND = " . $brandCont;
                    }
                } else {
                    // El usuario hace un filtro estando en una subcategoría...
                    if (isset($_SESSION['filtro_cat'])) {
                        $catt             = $_SESSION['filtro_cat'];
                        $filtroSecundario = " OR prd.BRAND = " . $brandCont;
                        $filtroQuery      = $filtroQuery . " " . $filtroSecundario . " AND cat.NAME = '$catt'";
                    } else {
                        // El usuario hace la la búsuqeda sin filtrar ninguna subcategoría.
                        $filtroSecundario = " OR prd.BRAND = " . $brandCont;
                        $filtroQuery      = $filtroQuery . " " . $filtroSecundario;
                    }
                }
                $cont++;
            }

            $datos = $product->filterProductsBrands($filtroQuery);

        }
        // Se ha seleccionado una o más marcas y el usuario ha especificado un precio máximo para la búsuqeda.
        // Este código está preparado para guardar estado en lso filtros. Si el usuario entra en una subcategoría
        // se guardará su nombre en una sesión que luego se usará en la query.
        elseif (isset($_POST['filtro']) && $_POST['maxPrice'] != '') {
            $idBrand  = $_POST['filtro'];
            $minPrice = aInt($_POST['minPrice']);
            $maxPrice = aInt($_POST['maxPrice']);

            $_SESSION['filtro_brand']    = $idBrand;
            $_SESSION['filtro_maxPrice'] = $maxPrice;

            foreach ($idBrand as $brandCont) {
                if ($cont == 0) {
                    // El usuario ya ha buscado un producto por subcategoría y ahora quiere hacer un filtro.
                    if (isset($_SESSION['filtro_cat'])) {
                        $catt        = $_SESSION['filtro_cat'];
                        $filtroQuery = " prd.BRAND = " . $brandCont . " AND prd.PRICE BETWEEN '$minPrice' AND '$maxPrice' AND cat.NAME = '$catt'";
                    }
                    // El usuario aún no ha buscado ningún producto por subcategoría y se ejecuta el filtro general.
                    else {
                        $filtroQuery = " prd.BRAND = " . $brandCont . " AND prd.PRICE BETWEEN '$minPrice' AND '$maxPrice'";
                    }
                } else {
                    // El usuario ya ha buscado un producto por subcategoría y ahora quiere hacer un filtro.
                    if (isset($_SESSION['filtro_cat'])) {
                        $catt             = $_SESSION['filtro_cat'];
                        $filtroSecundario = " OR prd.BRAND = " . $brandCont . " AND prd.PRICE BETWEEN '$minPrice' AND '$maxPrice' AND cat.NAME = '$catt'";
                        $filtroQuery      = $filtroQuery . " " . $filtroSecundario;
                    }
                    // El usuario aún no ha buscado ningún producto por subcategoría y se ejecuta el filtro general.

                    else {
                        $filtroSecundario = " OR prd.BRAND = " . $brandCont . " AND prd.PRICE BETWEEN '$minPrice' AND '$maxPrice'";
                        $filtroQuery      = $filtroQuery . " " . $filtroSecundario;
                    }
                }
                $cont++;
            }
            $datos = $product->filterProductsBrands($filtroQuery);

        }
        // El usuario ha hecho una búsuqeda solo por el precio (se buscará entre todas las marcas).
        else {
            $minPrice = aInt($_POST['minPrice']);
            $maxPrice = aInt($_POST['maxPrice']);

            $_SESSION['filtro_minPrice'] = $minPrice;
            $_SESSION['filtro_maxPrice'] = $maxPrice;
            if (isset($_SESSION['filtro_cat'])) {
                $catt        = $_SESSION['filtro_cat'];
                $filtroQuery = " prd.PRICE BETWEEN '$minPrice' AND '$maxPrice' AND cat.NAME = '$catt'";
            } else {
                $filtroQuery = " prd.PRICE BETWEEN '$minPrice' AND '$maxPrice'";
            }
            $datos = $product->filterProductsBrands($filtroQuery);
        }
        require_once("view/main/html/main_page.phtml");
    }
}
?>
