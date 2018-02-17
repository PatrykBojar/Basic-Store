<?php
require_once("model/productos_model.php");
require_once("model/marcas_model.php");
require_once("model/categorias_model.php");
require_once("model/imagenes_model.php");


class imagenes_controller {

    function insert_image() {
        // Array que contienen todos los datos de la imagen.
        $info = pathinfo($_FILES['imgUrl']['name']);

        if (isset($info['extension'])) {
            // Sacamos la extención actual de la imagen y la pasamos a minsúculas (compatibilidad en Windows y Linux).
            $ext = strtolower($info['extension']);
            if ($info['extension'] == "gif" || $info['extension'] == "jpg" || $info['extension'] == "png" || $info['extension'] == "jpeg"
                  || $info['extension'] == "tif" || $info['extension'] == "tiff" || $info['extension'] == "bmp") {
                // Ruta origen del archivo.
                $ruta_origen = $_FILES['imgUrl']['tmp_name'];
                // Obtenemos el ID del producto.
                $id          = $_POST['id'];
                // Obtenemos el valor del radio button para saber el tipo de imagen que ha elegido el administrador.
                $valor       = $_POST['typeimg'];
                switch ($valor) {
                    case "option1":
                        $ruta_destino = "view/img_product/" . $id . "-" . YEAR . "-" . MONTH . "-" . DAY . "_" . HOUR . ":" . MINUTE . ":" . SECOND . "." . $ext;
                        // Definimos la ruta del destino con nuestras consantes.
                        move_uploaded_file($ruta_origen, $ruta_destino);
                        //var_dump($ruta_destino); exit();
                        break;
                    case "option2":
                        $ruta_destino = "view/img_product/" . $id . "-" . YEAR . "-" . MONTH . "-" . DAY . "_" . HOUR . ":" . MINUTE . ":" . SECOND . "-carrousel-top." . $ext;
                        // Definimos la ruta del destino con nuestras consantes.
                        move_uploaded_file($ruta_origen, $ruta_destino);
                        break;
                    case "option3":
                        $ruta_destino = "view/img_product/" . $id . "-" . YEAR . "-" . MONTH . "-" . DAY . "_" . HOUR . ":" . MINUTE . ":" . SECOND . "-carrousel-product." . $ext;
                        // Definimos la ruta del destino con nuestras consantes.
                        move_uploaded_file($ruta_origen, $ruta_destino);
                        break;
                    default:
                        echo "Algo ha salido mal.";
                }
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
                // En caso de que las extensiones no coincidan.
            } else {
                require_once("error.php");
            }
            // En caso de que el archivo pasado no contenga ninguna ruta (raro).
        } else {
            require_once("error.php");
        }

    }
}

?>
