<?php
class productos_model {

    private $db;
    private $product;

    private $id, $name, $stock, $price, $sponsored, $shrtDesc, $lngDesc, $brand, $category;

    public function __construct() {
        $this->db      = Conectar::conexion();
        $this->product = array();
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getStock() {
        return $this->stock;
    }
    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getSponsored() {
        return $this->sponsored;
    }
    public function setSponsored($sponsored) {
        $this->sponsored = $sponsored;
    }

    public function getShrtDesc() {
        return $this->shrtDesc;
    }
    public function setShrtDesc($shrtDesc) {
        $this->shrtDesc = $shrtDesc;
    }

    public function getLngDesc() {
        return $this->$lngDesc;
    }
    public function setLngDesc($lngDesc) {
        $this->lngDesc = $lngDesc;
    }

    public function getBrand() {
        return $this->$brand;
    }
    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getCategory() {
        return $this->$category;
    }
    public function setCategory($category) {
        $this->category = $category;
    }

    public function get_products() {
        $query = $this->db->query("SELECT * FROM PRODUCT;");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function insert_product() {
        $sql    = "INSERT INTO PRODUCT (NAME, STOCK, PRICE, SPONSORED,
        SHORTDESCRIPTION,LONGDESCRIPTION, BRAND, CATEGORY) VALUES
         ('{$this->name}','{$this->stock}','{$this->price}','{$this->sponsored}',
         '{$this->shrtDesc}','{$this->lngDesc}','{$this->brand}','{$this->category}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }

    public function delete_product($id) {
        $sql    = "DELETE FROM PRODUCT WHERE ID='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    public function sortNombreAsc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY NAME ASC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function sortNombreDesc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY NAME DESC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function sortStockAsc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY STOCK ASC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }
    public function sortStockDesc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY STOCK DESC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function sortPriceAsc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY PRICE ASC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }
    public function sortPriceDesc() {
        $query = $this->db->query("SELECT * FROM PRODUCT ORDER BY PRICE DESC");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function showSponsoredProducts() {
        $query = $this->db->query("SELECT prd.SPONSORED AS 'SPONSORED',
                              prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE',
                              prd.NAME AS 'NAME', prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
                              prd.STOCK AS 'STOCK',prd.PRICE AS 'PRICE'
                              FROM PRODUCT prd LEFT JOIN PROMOTION prm
                              ON prm.PRODUCT = prd.ID
                              WHERE prd.SPONSORED = 'Y' OR
                              EXISTS(select * FROM PROMOTION
                                WHERE prd.ID = PROMOTION.PRODUCT);");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }
    // Es correcta la consulta para mostrar la descripcón larga según id clicado????
    public function ver_mas_alpha(){
      $query =         $query = $this->db->query("SELECT LONGDESCRIPTION FROM PRODUCT;");
      while ($rows = $query->fetch_assoc()) {
          $this->product[] = $rows;
      }
      return $this->product;
  }

  /*public function precio(){
    $query =         $query = $this->db->query("SELECT PRICE FROM PRODUCT;");
    while ($rows = $query->fetch_assoc()) {
        $this->product[] = $rows;
    }
    return $this->product;
}*/
}

?>
