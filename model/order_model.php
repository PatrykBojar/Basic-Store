<?php
class order_model {

    private $db;
    private $order, $orderlinedel, $products;

    public function __construct() {
        $this->db           = Conectar::conexion();
        $this->order        = array();
        $this->orderlinedel = array();
        $this->products     = array();
    }
    public function get_cart_product($id) {
        $consult = $this->db->query("SELECT PRODUCT.* , IMAGE.* FROM PRODUCT, IMAGE WHERE PRODUCT.ID = IMAGE.PRODUCT AND PRODUCT.ID = '" . $id . "';");
        $row     = $consult->fetch_assoc();
        return $row;
    }
    public function get_cart_count() {
        $consult = $this->db->query("SELECT SUM(QUANTITY) as QUANTITY FROM ORDERITEM WHERE `ORDER` = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING');");
        $row     = $consult->fetch_assoc();
        return $row;
    }
    public function get_UserOrder() {
        $user_order = $this->db->query("SELECT `ORDER`.ID, ORDERITEM.PRODUCT, ORDERITEM.QUANTITY, ORDERITEM.PRICE, PRODUCT.NAME, PRODUCT.SHORTDESCRIPTION, IMAGE.URL FROM `ORDER`, ORDERITEM, IMAGE, PRODUCT WHERE USER = '{$_SESSION['user']}' AND `ORDER`.ID = ORDERITEM.`ORDER` AND IMAGE.PRODUCT = ORDERITEM.PRODUCT AND ORDERITEM.PRODUCT = PRODUCT.ID AND `ORDER`.ID = (SELECT MAX(ID) FROM `ORDER`);");
        while ($row = $user_order->fetch_assoc()) {
            $this->order[] = $row;
        }
        return $this->order;
    }
    public function order_UserRecord() {
        $query = $this->db->query("SELECT prd.NAME, prd.SHORTDESCRIPTION,prd.PRICE,ord.`DATE`,oitm.QUANTITY FROM
          `ORDER` ord left JOIN ORDERITEM oitm on ord.ID = oitm.ORDER LEFT JOIN PRODUCT prd ON prd.ID = oitm.PRODUCT
          WHERE USER = '{$_SESSION['user']}' AND ord.PAYMENTINFO = 'PAID'");
        while ($row = $query->fetch_assoc()) {
            $this->order[] = $row;
        }
        return $this->order;
    }

    public function reject_prevOrder() {
        $consult   = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER` WHERE USER = '{$_SESSION['user']}';");
        $id        = $consult->fetch_assoc();
        $order_mod = $this->db->query("UPDATE `ORDER` SET PAYMENTINFO = 'REJECTED' WHERE ID = '{$id['ID']}';");
    }
    public function checkout_UserOrder() {
        $consult   = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER` WHERE USER = '{$_SESSION['user']}';");
        $id        = $consult->fetch_assoc();
        $order_mod = $this->db->query("UPDATE `ORDER` SET PAYMENTINFO = 'PAID' WHERE ID = '{$id['ID']}';");
    }
    public function check_UserOrder() {
        $consult = $this->db->query("SELECT PAYMENTINFO FROM `ORDER` WHERE ID = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}') AND PAYMENTINFO = 'PENDING';");
        $row     = $consult->fetch_assoc();
        return $row['PAYMENTINFO'];
    }
    public function appendOrder($userCart) {
        //$direccion = "SELECT ADDRESS FROM USER WHERE USERNAME = '{$_SESSION['user']}';";
        $insertorder     = $this->db->query("INSERT INTO `ORDER` (SHIPPINGADDRESS,USER) VALUES ('Calle Desesperación 12','{$_SESSION['user']}');");
        $order           = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER`;");
        $row             = $order->fetch_assoc();
        $array_pos       = 0;
        $orderline_value = 1;
        foreach ($userCart as $dato => $value) {
            $insertorder_item = $this->db->query("INSERT INTO ORDERITEM (ORDERLINE,`ORDER`,PRODUCT,QUANTITY,PRICE) VALUES ('$orderline_value', '{$row['ID']}', '{$userCart[$array_pos]['ID']}', '{$userCart[$array_pos]['QUANTITY']}', '{$userCart[$array_pos]['PRICE']}');");
            $array_pos++;
            $orderline_value++;
        }
    }
    public function deleteOrder_Item($id) {
        $deleteorder_item = $this->db->query("DELETE ORDERITEM FROM ORDERITEM, `ORDER` WHERE ORDERITEM.PRODUCT = {$id} AND `ORDER`.USER = '{$_SESSION['user']}' AND ORDERITEM.`ORDER` = `ORDER`.ID;");
        $lastitem         = $this->db->query("SELECT ORDERLINE FROM ORDERITEM WHERE `ORDER` = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING');");
        $lastitemcheck    = $lastitem->fetch_assoc();
        if ($lastitemcheck == NULL) {
            $deleteorder = $this->db->query("DELETE FROM `ORDER` WHERE USER = '{$_SESSION['user']}' ORDER BY ID DESC LIMIT 1;");
        }
    }
    public function deleteOrderandItems() {
        $deleteorder_item = $this->db->query("DELETE ORDERITEM FROM ORDERITEM, `ORDER` WHERE  ORDERITEM.`ORDER` = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}');");
        $deleteorder      = $this->db->query("DELETE FROM `ORDER` WHERE USER = '{$_SESSION['user']}' ORDER BY ID DESC LIMIT 1;");
    }
    public function appendOrder_Item($id) {
        //$direccion = "SELECT ADDRESS FROM USER WHERE USERNAME = '{$_SESSION['user']}';";
        $lastitem      = $this->db->query("SELECT ORDERLINE FROM ORDERITEM WHERE `ORDER` = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING');");
        $lastitemcheck = $lastitem->fetch_assoc();
        if ($lastitemcheck == NULL) {
            $insertorder = $this->db->query("INSERT INTO `ORDER` (SHIPPINGADDRESS,USER) VALUES ('Calle Desesperación 12','{$_SESSION['user']}');");
        }
        $product_price = $this->get_cart_product($id);
        $consult       = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING';");
        $id_order      = $consult->fetch_assoc();
        $max_id        = $this->db->query("SELECT MAX(ORDERITEM.ORDERLINE) AS ID FROM ORDERITEM, `ORDER` WHERE `ORDER`.USER = '{$_SESSION['user']}' AND ORDERITEM.`ORDER` = '{$id_order['ID']}';");
        $max_Orderline = $max_id->fetch_assoc();
        $consult_Item  = $this->db->query("SELECT ORDERLINE, PRODUCT, QUANTITY, PRICE FROM ORDERITEM WHERE `ORDER` = '{$id_order['ID']}';");
        while ($id_Item = $consult_Item->fetch_assoc()) {
            $this->products[] = $id_Item;
        }
        foreach ($this->products as $dato => $value) {
            if ($value['PRODUCT'] == $id) {
                $update_Orderitem = $this->db->query("UPDATE ORDERITEM SET QUANTITY = ({$value['QUANTITY']}+1) WHERE PRODUCT = {$id}");
                return;
            }
        }
        $insertOrder_item = $this->db->query("INSERT INTO ORDERITEM (ORDERLINE,`ORDER`,PRODUCT,QUANTITY,PRICE) VALUES (({$max_Orderline['ID']}+1), '{$id_order['ID']}','$id', '1', '{$product_price['PRICE']}');");
    }
    public function appendOrder_Itemwithquantity($id, $quantity) {
        //$direccion = "SELECT ADDRESS FROM USER WHERE USERNAME = '{$_SESSION['user']}';";
        $lastitem      = $this->db->query("SELECT ORDERLINE FROM ORDERITEM WHERE `ORDER` = (SELECT MAX(ID) FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING');");
        $lastitemcheck = $lastitem->fetch_assoc();
        if ($lastitemcheck == NULL) {
            $insertorder = $this->db->query("INSERT INTO `ORDER` (SHIPPINGADDRESS,USER) VALUES ('Calle Desesperación 12','{$_SESSION['user']}');");
        }
        $product_price = $this->get_cart_product($id);
        $consult       = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER` WHERE USER = '{$_SESSION['user']}' AND PAYMENTINFO = 'PENDING';");
        $id_order      = $consult->fetch_assoc();
        $max_id        = $this->db->query("SELECT MAX(ORDERITEM.ORDERLINE) AS ID FROM ORDERITEM, `ORDER` WHERE `ORDER`.USER = '{$_SESSION['user']}' AND ORDERITEM.`ORDER` = '{$id_order['ID']}';");
        $max_Orderline = $max_id->fetch_assoc();
        $consult_Item  = $this->db->query("SELECT ORDERLINE, PRODUCT, QUANTITY, PRICE FROM ORDERITEM WHERE `ORDER` = '{$id_order['ID']}';");
        while ($id_Item = $consult_Item->fetch_assoc()) {
            $this->products[] = $id_Item;
        }
        foreach ($this->products as $dato => $value) {
            if ($value['PRODUCT'] == $id) {
                $update_Orderitem = $this->db->query("UPDATE ORDERITEM SET QUANTITY = ({$value['QUANTITY']} + $quantity) WHERE PRODUCT = {$id}");
                return;
            }
        }
        $insertOrder_item = $this->db->query("INSERT INTO ORDERITEM (ORDERLINE,`ORDER`,PRODUCT,QUANTITY,PRICE) VALUES (({$max_Orderline['ID']}+1), '{$id_order['ID']}','$id', '$quantity', '{$product_price['PRICE']}');");
    }
}
