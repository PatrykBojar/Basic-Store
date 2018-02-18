<?php
require_once("model/categorias_model.php");
/**
 * Gestiona las cateogorías
 * @author Patryk Bojar <patrickbojar12344@gmail.com>
 */
class categorias_controller {
  /**
   * Inserta las categorías
   */
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
    /**
     * Elimina una cateogoría
     */
    function delete_category() {
        if (isset($_GET['ID'])) {
            $category = new categorias_model();
            $id       = $_GET['ID'];

            $error = $category->delete_category($id);

            if (!$error) {
                header("Location: index.php");
                exit();
            } else {
                echo $error;
            }
        }
    }
    /**
     * Inserta una subcategoría
     */
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
        } else {
            require_once("error.php");

        }
    }
/**
 * Elimina una subcategoría
 */
    function delete_subCategory() {
        if (isset($_GET['id'])) {
            $category = new categorias_model();
            $id       = $_GET['id'];

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
