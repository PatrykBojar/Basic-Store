<?php
class order_model{

  private $db;

  public function __construct() {
        $this->db      = Conectar::conexion();
    }
    public function get_cart_items($id){
      $query = $this->db->query("SELECT prd.* , img.* FROM PRODUCT prd, IMAGE img WHERE prd.ID = img.PRODUCT AND prd.ID = '$id';");
      $row = $query->fetch_assoc();
      return $row;
  }
  public function addOrder($cart){
    $query = $this->db->query("INSERT INTO `ORDER` (SHIPPINGADDRESS,USER) VALUES ('xxx','{$_SESSION['username']}');");
    $order = $this->db->query("SELECT MAX(ID) AS ID FROM `ORDER`;");
    $row = $order->fetch_assoc();
    $array_pos = 0;
    $orderline_value = 1;
    foreach ($userCart as $dato => $value) {
     $insertorder_item = $this->db->query("INSERT INTO ORDERITEM (ORDERLINE,`ORDER`,PRODUCT,QUANTITY,PRICE)
                VALUES ('$orderline_value', '{$row['ID']}', '{$cart[$array_pos]['ID']}',
                    '{$cart[$array_pos]['QUANTITY']}', '{$cart[$array_pos]['PRICE']}');");
     $array_pos++;
     $orderline_value++;
       }
     }

     public function get_UserOrder(){
       $user_order=$this->db->query("SELECT ord.ID, oitm.PRODUCT, oitm.QUANTITY,
                  oitm.PRICE FROM `ORDER` ord,ORDERITEM oitm
                  WHERE USER = '{$_SESSION['username']}'
                  AND ord.ID = oitm.`ORDER`
                  AND ord.ID = (SELECT MAX(ID) FROM `ORDER`);");
        while($row=$user_order->fetch_assoc()){
          $this->order[]=$row;
        }

     }





}




 ?>
