<?php
require_once("model/marcas_model.php");
/**
 * Maneja las marcas, inserta, elimina, etc.
 */
class marcas_controller {
/**
 * Muestra la página para editar los productos.
 */
   function show_manage_product() {
       require_once("view/admin/html/productos_manage.phtml");
   }

/**
 * Inserta una marca
 */
/*/
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
/**
 * Elimina una marca
 * @return [type] [description]
 */
/*
   function delete_brand() {
       if (isset($_GET['id'])) {
           $brand = new marcas_model();
           $id    = $_GET['id'];

           $error = $brand->delete_brand($id);

           if (!$error) {
               header("Location: index.php");
               exit();
           } else {
               echo $error;
           }
       }
   }*/
}

?>
