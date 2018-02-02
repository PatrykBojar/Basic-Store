<?php
require_once("model/marcas_model.php");
class marcas_controller{

  function show_manage_product() {
      require_once("view/admin/html/productos_manage.phtml");
  }


function list_brands() {
    $brand = new marcas_model();
    $datosBnd   = $brand->get_brands();
    require_once("view/admin/html/productos_manage.phtml");
    //require_once("view/admin/php/listar_marcas.php");
    //require_once("view/main/php/menu.php");

}

function insert_brand() {
    $brand = new marcas_model();

    if (isset($_POST['insert'])) {
        $brand->setName($_POST['name']);
        $error = $brand->insert_brand();

        if (!$error) {
            header("Location: index.php");
            exit();
        } else {
            echo $error;
        }
    }
}

function delete_brand() {
    if (isset($_GET['id'])) {
        $brand = new marcas_model();
        $id      = $_GET['id'];

        $error = $brand->delete_brand($id);

        if (!$error) {
            header("Location: index.php");
            exit();
        } else {
            echo $error;
        }
    }
}
}

 ?>
