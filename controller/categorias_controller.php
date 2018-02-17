<?php
require_once("model/categorias_model.php");
/**
 * [categorias_controller description]
 * @author Patryk Bojar <patrickbojar12344@gmail.com>
 */
class categorias_controller{

  /*function list_categories() {
      $category = new categorias_model();
      $categories   = $category->get_categories();
      $subCategory = new categorias_model();
      $subCategories   = $category->get_subCategories();
      //require_once("view/admin/html/productos_manage.phtml");
      //require_once("view/admin/php/listar_categorias.php");
      include("view/admin/html/productos_manage.phtml");

  }*/
  /*function list_subCategories() {
      $category = new categorias_model();
      $categoriesSub   = $category->get_subCsaategories();
      require_once("view/admin/html/productos_manage.phtml");
      //require_once("view/admin/php/listar_categorias.php");
  }*/

  function insert_category() {
      $category = new categorias_model();
          $category->setName($_POST['nmCat']);
          $error = $category->insert_category();

          if (!$error) {
              header("Location: index.php");
              exit();
          } else {
              echo $error;
          }
  }
  function delete_category() {
      if (isset($_GET['ID'])) {
          $category = new categorias_model();
          $id      = $_GET['ID'];

          $error = $category->delete_category($id);

          if (!$error) {
              header("Location: index.php");
              exit();
          } else {
              echo $error;
          }
      }
  }
  function insert_subCategory() {
      $category = new categorias_model();
      if ($_POST['subcatName'] != '') {
          $category->setName($_POST['subcatName']);
          $category->setParentCategory($_POST['parentCat']);
          $error = $category->insert_subCategory();

          if (!$error) {
              header("Location: index.php");
              exit();
          } else {
              echo $error;
          }
      }else{
        require_once("error.php");

      }
  }

  function delete_subCategory() {
      if (isset($_GET['id'])) {
          $category = new categorias_model();
          $id      = $_GET['id'];

          $error = $category->delete_subCategory($id);

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
