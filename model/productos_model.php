<?php
class productos_model {

    private $db;
    private $product;

    private $id, $name, $stock, $price, $sponsored, $shrtDesc, $lngDesc, $brand, $category, $discout, $promDay, $promMonth, $promYear;

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
    public function getDay() {
        return $this->$promDay;
    }
    public function setDay($promDay) {
        $this->promDay = $promDay;
    }

    public function getMonth () {
        return $this->$promMonth;
    }
    public function setMonth($promMonth) {
        $this->promMonth = $promMonth;
    }

    public function getYear() {
        return $this->$promYear;
    }
    public function setYear($promYear) {
        $this->promYear = $promYear;
    }

    public function getDiscount() {
        return $this->$discout;
    }
    public function setDiscount($discout) {
        $this->discout = $discout;
    }

    /**
     * Devuelve todos los productos solicitados.
     * @return array todos los productos
     */
        public function get_products() {
            $query = $this->db->query("SELECT * FROM PRODUCT;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
/**
 * Busca el último id del producto (último en ser insertrado) en la base de datos.
 * @return array el id del último producto.
 */
        public function getMaxIdProduct() {
            $query = $this->db->query("SELECT MAX(ID) AS 'PRODUCTMAXID' FROM PRODUCT;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
/**
 * Devuelve el precio más alto y bajo de todos los productos
 * @return array precio más alto y bajo.
 */
        public function minMaxPrice() {
            $query = $this->db->query("SELECT MAX(PRICE) AS 'MAXPRICE', MIN(PRICE) AS 'MINPRICE' FROM PRODUCT;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }

    /**
     * Inserta un producto a la base de datos.
     * @return mixed si la query no se ejcuta bien devolverá un error mostrando la dicha query y el posible error en ella, en caso contrario devolverá false.
     */
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
    /**
     * Crea una promoción de un producto.
     * @param  integer $id el id del producto pasado al hacer clic en un producto.
     * @return mixed si la query no se ejcuta bien devolverá un error mostrando la dicha query y el posible error en ella, en caso contrario devolverá false.
     */
        public function create_promotion($id) {
          $promDay = mysqli_real_escape_string($this->db, $this->promDay);
          $promMonth = mysqli_real_escape_string($this->db, $this->promMonth);
          $promYear = mysqli_real_escape_string($this->db, $this->promYear);
          // Formato de la fecha adaptado a la base de datos (año-mes-día).
          $endPromotionDate   = $promYear."-".$promMonth."-".$promDay;
          $discount     = mysqli_real_escape_string($this->db, $this->discout);

            $query = "INSERT INTO PROMOTION (DISCOUNTPERCENTAGE, STARTDATE, ENDDATE,PRODUCT) VALUES
             ('$discount',CURRENT_TIMESTAMP,DATE_FORMAT('$endPromotionDate', '%Y-%m-%d %H-%i-%S'),'$id')";
            $result = $this->db->query($query);
            if ($this->db->error)
                return "$query<br>{$this->db->error}";
            else {
                return false;
            }
        }
    /**
     * Elimina un producto.
     * @param  integer $id el id del producto pasado al hacer clic en un producto.
     * @return mixed si la query no se ejcuta bien devolverá un error mostrando la dicha query y el posible error en ella, en caso contrario devolverá false.
     */
        public function delete_product($id) {
            $query    = "DELETE FROM PRODUCT WHERE ID='$id'";
            $result = $this->db->query($query);

            if ($this->db->error)
                return "$query<br>{$this->db->error}";
            else {
                return false;
            }
        }
        /**
         * Ordena los producos de la A a la Z.
         * @return array todos los productos ordenados por nombre de A a la Z.
         */
        public function sortNombreAsc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY NAME ASC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos de la Z a la A.
         * @return array todos los productos ordenados por nombre de Z a la A.
         */
        public function sortNombreDesc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY NAME DESC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por el stock, de menor a mayor.
         * @return array todos los productos ordenados por stock.
         */
        public function sortStockAsc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY STOCK ASC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por el stock, de mayor a menor
         * @return array todos los productos ordenados por stock.
         */
        public function sortStockDesc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY STOCK DESC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por el precio, de menor a mayor.
         * @return array todos los productos ordenados por precio.
         */
        public function sortPriceAsc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY PRICE ASC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por el precio, de mayor a menor.
         * @return array todos los productos ordenados por precio.
         */
        public function sortPriceDesc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY PRICE DESC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por la marca, de la A a la Z.
         * @return array todos los productos ordenados por la marca.
         */
        public function sortBrandAsc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY BRAND ASC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }
        /**
         * Ordena los productos por la marca, de la Z a la A.
         * @return array todos los productos ordenados por la marca.
         */
        public function sortBrandDesc() {
            $query = $this->db->query("SELECT prd.*, prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE' FROM PRODUCT prd LEFT JOIN PROMOTION prm
              ON prd.ID = prm.PRODUCT ORDER BY BRAND DESC;");
            while ($rows = $query->fetch_assoc()) {
                $this->product[] = $rows;
            }
            return $this->product;
        }

    public function showSponsoredProducts() {
        $query = $this->db->query("SELECT prd.ID as'ID',prd.SPONSORED AS 'SPONSORED',
                              prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE',
                              prd.NAME AS 'NAME', prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
                              prd.STOCK AS 'STOCK',prd.PRICE AS 'PRICE',prd.LONGDESCRIPTION AS 'LONGDESCRIPTION', prd.CATEGORY
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
        $query = $this->db->query("SELECT prd.ID AS 'ID', prd.NAME AS 'NAME',prd.LONGDESCRIPTION AS 'LONGDESCRIPTION', prd.CATEGORY,
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
        $query = $this->db->query("SELECT prd.ID AS 'ID', prd.STOCK AS 'STOCK',
          prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',prd.LONGDESCRIPTION AS 'LONGDESCRIPTION',
           prd.NAME AS 'NAME', prd.PRICE AS 'PRICE', prd.SPONSORED AS 'SPONSORED', DISCOUNTPERCENTAGE,prd.CATEGORY
           FROM PRODUCT prd
           LEFT JOIN PROMOTION prm
        on prm.PRODUCT  = prd.ID
        WHERE NAME LIKE '%$name%' OR SHORTDESCRIPTION LIKE '%$name%'
          OR LONGDESCRIPTION LIKE '%$name%';");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function filterProductsBrands($filtroQuery) {
        $query = $this->db->query("SELECT
    prd.ID AS 'ID',
    prd.NAME AS 'NAME',
    prd.LONGDESCRIPTION AS 'LONGDESCRIPTION',
    prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
    prd.PRICE AS 'PRICE',
    prd.STOCK AS 'STOCK',
    prd.SPONSORED AS 'SPONSORED',
    prd.CATEGORY,
    prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE',
    bnd.NAME AS 'BRANDNAME',
    bnd.ID AS 'BRANDID',
    cat.NAME AS 'CATNAME',
    cat.ID AS 'CATID',
    prd.CATEGORY AS 'CATPRDID',
    cat.PARENTCATEGORY AS 'PARENTCATEGORY'
FROM
    PRODUCT prd
LEFT JOIN PROMOTION prm ON
    prm.PRODUCT = prd.ID
LEFT JOIN BRAND bnd ON
    bnd.ID = prd.BRAND
LEFT JOIN CATEGORY cat ON
    cat.ID = prd.CATEGORY WHERE $filtroQuery;");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }


    public function show_subCatProduct($name) {
        $query = $this->db->query("SELECT
  prd.SPONSORED AS 'SPONSORED',
  prd.ID AS 'ID',
  prd.NAME AS 'NAME',
  prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
  prd.LONGDESCRIPTION AS 'LONGDESCRIPTION',
  prd.STOCK AS 'STOCK',
  prd.PRICE AS 'PRICE',
  prd.CATEGORY,
  cat.NAME AS 'CATEGORYNAME',
  prm.DISCOUNTPERCENTAGE,
  img.URL AS 'URL'
FROM
  PRODUCT prd
JOIN
  CATEGORY cat ON prd.CATEGORY = cat.ID
LEFT JOIN
  IMAGE img ON prd.ID = img.PRODUCT
LEFT JOIN
  PROMOTION prm ON prm.PRODUCT = prd.ID
WHERE
  cat.NAME = '$name' AND img.CAROUSEL = 'N';");
        while ($rows = $query->fetch_assoc()) {
            $this->product[] = $rows;
        }
        return $this->product;
    }

    public function showProductImg(){
      $query = $this->db->query("SELECT img.URL AS 'URL', prd.NAME, prd.ID FROM PRODUCT prd
LEFT JOIN IMAGE img ON img.PRODUCT = prd.ID
WHERE img.CAROUSEL = 'N' OR img.URL IS NULL;");
      while ($rows = $query->fetch_assoc()) {
          $this->product[] = $rows;
      }
      return $this->product;
    }
    public function showCarrouselImg(){
      $query = $this->db->query("SELECT URL,NAME AS 'CARRNAME',PRICE,prm.DISCOUNTPERCENTAGE
                    FROM IMAGE img JOIN PRODUCT prd  ON img.PRODUCT = prd.ID
                    LEFT JOIN PROMOTION prm ON prm.PRODUCT = prd.ID
                    WHERE CAROUSEL = 'Y' AND URL LIKE '%-top%';");
      while ($rows = $query->fetch_assoc()) {
          $this->product[] = $rows;
      }
      return $this->product;
    }

    public function showCarrouselProductImg($name){
      $query = $this->db->query("SELECT URL,NAME AS 'CARRNAME' FROM IMAGE img
                    JOIN PRODUCT prd ON img.PRODUCT = prd.ID
                    WHERE CAROUSEL = 'Y' AND prd.NAME LIKE '$name';");
      while ($rows = $query->fetch_assoc()) {
          $this->product[] = $rows;
      }
      return $this->product;
    }

    public function productRealInfo(){
      $query = $this->db->query("SELECT
  prd.ID AS 'ID',
  prd.NAME AS 'NAME',
  prd.LONGDESCRIPTION AS 'LONGDESCRIPTION',
  prd.SHORTDESCRIPTION AS 'SHORTDESCRIPTION',
  prd.PRICE AS 'PRICE',
  prd.STOCK AS 'STOCK',
  prd.SPONSORED AS 'SPONSORED',
  prm.DISCOUNTPERCENTAGE AS 'DISCOUNTPERCENTAGE',
  bnd.NAME AS 'BRANDNAME',
  cat.NAME AS 'CATNAME',
  cat.ID AS 'CATID',
  prd.CATEGORY AS 'CATPRDID',
  cat.PARENTCATEGORY AS 'PARENTCATEGORY'
FROM
  PRODUCT prd
LEFT JOIN
  PROMOTION prm ON prm.PRODUCT = prd.ID
LEFT JOIN
  BRAND bnd ON bnd.ID = prd.BRAND
LEFT JOIN
  CATEGORY cat ON cat.ID = prd.CATEGORY;");
while ($rows = $query->fetch_assoc()) {
    $this->product[] = $rows;
}
return $this->product;
}
public function productPageImg(){
  $query = $this->db->query("SELECT img.URL AS 'URL', prd.NAME AS 'PRDNAME',prd.ID AS 'PRDID' FROM PRODUCT prd
LEFT JOIN IMAGE img ON img.PRODUCT = prd.ID
WHERE img.URL NOT LIKE '%-top%' OR img.URL IS NULL;");
while ($rows = $query->fetch_assoc()) {
    $this->product[] = $rows;
}
return $this->product;
}
}



?>
