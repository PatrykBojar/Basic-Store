<?php
require_once("model/productos_model.php");
require_once("model/marcas_model.php");
require_once("model/categorias_model.php");
require_once("model/imagenes_model.php");


class imagenes_controller {


  function insert_image(){
        // Array que contienen todos los datos de la imagen.
        $info = pathinfo($_FILES['imgUrl']['name']);
        // Ruta origen del archivo.
        $ruta_origen = $_FILES['imgUrl']['tmp_name'];
        // Sacamos la extención actual de la imagen y la pasamos a minsúculas (compatibilidad en Windows y Linux).
        $ext = strtolower($info['extension']);
        // Obtenemos el ID del producto.
        $id = $_POST['id'];
        // Definimos la ruta del destino con nuestras consantes.
        $ruta_destino = "view/img_product/".$id."-".YEAR."-".MONTH."-".DAY."_".HOUR.":".MINUTE.":".SECOND.".".$ext;
        move_uploaded_file($ruta_origen, $ruta_destino);
        $imagen = new imagenes_model();
        $imagen->setImgUrl($ruta_destino);
        $imagen->setId($_POST['id']);
        $imagen->setCarousel($_POST['isCarousel']);


        $error = $imagen->insert_image();

        if (!$error) {
            header("Location: index.php");
            exit();
        } else {
            echo $error;
        }
      }
  }

 ?>
