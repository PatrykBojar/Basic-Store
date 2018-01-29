<?php
require_once("model/categorias_model.php");
class categorias_controller{

  function list_categories() {
      $category = new categorias_model();
      $datosCtg   = $category->get_categories();
      require_once("view/admin/html/productos_manage.phtml");
    //  require_once("view/admin/php/listar_categorias.php");
  }
  function list_subCategories() {
      $category = new categorias_model();
      $datosCtg   = $category->get_subCategories();
      require_once("view/admin/html/productos_manage.phtml");
      //require_once("view/admin/php/listar_categorias.php");
  }

  function insert_category() {
      $category = new categorias_model();

      if (isset($_POST['insert'])) {
          $category->setName($_POST['name']);
          $category->setStock($_POST['parentcategory']);
          $error = $category->insert_category();

          if (!$error) {
              header("Location: index.php");
              exit();
          } else {
              echo $error;
          }
      }
  }
  function delete_category() {
      if (isset($_GET['id'])) {
          $category = new categorias_model();
          $id      = $_GET['id'];

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

      if (isset($_POST['insert'])) {
          $category->setName($_POST['name']);
          $category->setStock($_POST['parentcategory']);
          $error = $category->insert_subCategory();

          if (!$error) {
              header("Location: index.php");
              exit();
          } else {
              echo $error;
          }
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
