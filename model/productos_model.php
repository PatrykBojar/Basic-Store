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

        $name      = mysqli_real_escape_string($this->db, $this->name);
        $stock     = mysqli_real_escape_string($this->db, $this->stock);
        $price     = mysqli_real_escape_string($this->db, $this->price);
        $sponsored = mysqli_real_escape_string($this->db, $this->sponsored);
        $shrtDesc  = mysqli_real_escape_string($this->db, $this->shrtDesc);
        $lngDesc   = mysqli_real_escape_string($this->db, $this->lngDesc);
        $brand     = mysqli_real_escape_string($this->db, $this->brand);
        $category  = mysqli_real_escape_string($this->db, $this->category);


        $query = "INSERT INTO PRODUCT (NAME, STOCK, PRICE, SPONSORED,
        SHORTDESCRIPTION,LONGDESCRIPTION, BRAND, CATEGORY) VALUES
         ('$name','$stock','$price','$sponsored','$shrtDesc','$lngDesc','$brand','$category')";
        $result = $this->db->query($query);
        if ($this->db->error)
            return "$query<br>{$this->db->error}";
        else {
            return false;
        }
    }

    public function delete_product($id) {
        $query    = "DELETE FROM PRODUCT WHERE ID='$id'";
        $result = $this->db->query($query);

        if ($this->db->error)
            return "$query<br>{$this->db->error}";
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

    public function showNotSponsoredProducts() {
        $query = $this->db->query("SELECT prd.ID AS 'ID', prd.NAME AS 'NAME',
                                    prd.PRICE AS 'PRICE' FROM PRODUCT prd LEFT JOIN
                                    PROMOTION prm ON prm.PRODUCT = prd.ID
                                    WHERE NOT EXISTS
                                    (SELECT * FROM PROMOTION
                                      WHERE prd.ID = PROMOTION.PRODUCT);");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function buscador($name) {
        $query = $this->db->query("SELECT *,DISCOUNTPERCENTAGE FROM PRODUCT prd LEFT JOIN PROMOTION prm
        on prm.PRODUCT  = prd.ID WHERE NAME LIKE '%$name%' OR SHORTDESCRIPTION LIKE '%$name%' OR LONGDESCRIPTION LIKE '%$name%'");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function show_subCatProduct($name) {
        $query = $this->db->query("SELECT
        prd.SPONSORED AS 'SPONSORED',
        prd.NAME AS 'NAME',
        prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
        prd.LONGDESCRIPTION AS 'LONGDESCRIPTION',
        prd.STOCK AS 'STOCK',
        prd.PRICE AS 'PRICE',
        cat.NAME AS 'CATEGORYNAME',
        prm.DISCOUNTPERCENTAGE
      FROM
        PRODUCT prd
      JOIN
        CATEGORY cat ON prd.CATEGORY = cat.ID
      LEFT JOIN
        PROMOTION prm ON prm.PRODUCT = prd.ID
        WHERE cat.NAME = '$name';");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }
}


?>
