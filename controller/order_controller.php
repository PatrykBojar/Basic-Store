<?php
require_once("model/order_model.php");
/**
 * Muestra, gestiona, añade y elimina productos del carrito. Se encarga de
 * manjear todos los datos relacionados con el carrito.
 */
class order_controller {
/**
 * Muestra el carrito
 */
    public function show_cart() {
        $data = new order_model();
        //$categories = new categories_model();
        if (isset($_SESSION['user'])) {
            $check = $data->check_UserOrder();
            $datos = $data->get_UserOrder();
            $count = $data->get_cart_count();
            //$menucategories = $categories->get_Categories();
        }
        require_once("view/main/html/cart_page.phtml");
    }
    /**
     * Muestra el historial de compras de cada usuario.
     */
    public function order_UserRecord() {
        $records = new order_model();
        $records = $records->order_UserRecord();
        require_once("view/main/html/record_page.phtml");

    }
    /**
     * Hace la compra y borra el carrito.
     */
    public function checkout() {
        $checkout = new order_model();
        $checkout->checkout_UserOrder();
        require_once("view/main/html/cart_page.phtml");
    }
    /**
    * Añade un producto al pedido del usuario.
     * @param integer $id id del producto.
     */
    public function addItem_toOrder($id) {
        $additem = new order_model();
        $additem->appendOrder_Item($id);
        header('Location: index.php');
        exit();
    }
    /**
     * [addItem_toOrderwithQuantity description]
     * @param integer $id       id del producto.
     * @param integer $quantity cantidad de productos seleccionados.
     */
    public function addItem_toOrderwithQuantity($id, $quantity) {
        $additem = new order_model();
        $additem->appendOrder_Itemwithquantity($id, $quantity);
        header('Location: index.php');
        exit();
    }
    /**
     * Inserta un prodcto en el carrito.
     * @param  integer $id id del producto.
     */
    public function insert_cart_product($id) {
        $product = new order_model();
        $row     = $product->get_cart_product($id);
        // Si la cantidad seleccionada es dinstinta a NULL obtenemos su valor.
        // En caso contrario valdrá 1 por defecto.
        if ($_POST['quantity'] != NULL) {
            $nr_units = $_POST['quantity'];
        } else {
            $nr_units = 1;
        }
        // Guardamos la información deseada del producto en el array.
        $itemExists = false;
        $item       = array(
            array(
                'NAME' => $row["NAME"],
                'SHORTDESCRIPTION' => $row["SHORTDESCRIPTION"],
                'ID' => $row["ID"],
                'QUANTITY' => $nr_units,
                'PRICE' => $row["PRICE"],
                'URL' => $row['URL']
            )
        );
        // Si el carrito no está vacío recorremos el array bidimensional.
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $dato => $value) {
                foreach ($_SESSION["cart"][$dato] as $title => $value_dato) {
                    if ("ID" == $title) {
                        if ($id == $value_dato) {
                            $itemExists = true;
                            $_SESSION["cart"][$dato]["QUANTITY"] += $nr_units;
                        }
                    }
                }
            }
            if (!$itemExists) {
                $_SESSION["cart"] = array_merge($_SESSION["cart"], $item);
            }
        } else {
            $_SESSION["cart"] = $item;
        }
        header('Location: index.php');
        exit();
    }
    /**
     * Elimina un producto del carrito.
     * @param  integer $id id del producto.
     */
    public function delete_cart_product($id) {
      // Si el carrito no está vacío recorremos su array y buscamos el producto con
      // la id seleccionada para borrarla.
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $dato => $value) {
                foreach ($_SESSION['cart'][$dato] as $title => $value_dato) {
                    if ("ID" == $title) {
                        if ($id == $value_dato) {
                            unset($_SESSION['cart'][$dato]);
                        }
                    }
                }
            }
        }
        header('Location: index.php?controller=order&action=show_cart');
    }
    // Quitamos un producto del carrito (son sesión de usuario.);
    public function delete_cartOrder_product($id) {
        $delete = new order_model();
        $delete->deleteOrder_Item($id);
        header('Location: index.php?controller=order&action=show_cart');
        exit();
    }
    /**
     * Vacíamos por completo el carrito.
     */
    public function empty_cart_product() {
        unset($_SESSION['cart']);
        header('Location: index.php?controller=order&action=show_cart');
        exit();
    }
    /**
     * Vacíamos todo el carrito (con sesión de usuario).
     */
    public function empty_allOrder() {
        $delete = new order_model();
        $delete->deleteOrderandItems();
        header('Location: index.php?controller=order&action=show_cart');
        exit();
    }
}
?>
