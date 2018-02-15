<?php
class categorias_model {
    private $db;
    private $category;
    private $id, $name, $parentCategory;
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
    public function getParentCategory() {
        return $this->stock;
    }
    public function setParentCategory($parentCategory) {
        $this->parentCategory = $parentCategory;
    }
    public function __construct() {
        $this->db      = Conectar::conexion();
        $this->category = array();
    }
    public function get_categories() {
        $query = $this->db->query("SELECT * FROM CATEGORY WHERE PARENTCATEGORY IS NULL");
        while ($rows = $query->fetch_assoc()) {
            $this->category[] = $rows;
        }
        return $this->category;
    }

    public function get_subCategories() {
        $query = $this->db->query("SELECT DISTINCT c1.NAME AS 'CATEGORIA',
          c2.NAME AS 'SUBCATEGORIA', c2.PARENTCATEGORY AS 'PARENTCATEGORY',
          c2.ID AS 'ID' FROM CATEGORY c1, CATEGORY c2
          WHERE c1.ID = c2.PARENTCATEGORY;");
        while ($rows = $query->fetch_assoc()) {
            $this->category[] = $rows;
        }
        return $this->category;
    }





    public function insert_category() {
        $sql    = "INSERT INTO CATEGORY (NAME) VALUES
        ('{$this->name}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }

    public function delete_category($id) {
        $sql    = "DELETE FROM CATEGORY WHERE id='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }

    /*public function show_subCatUl($id){
      $query = $this->db->query("SELECT cat.NAME AS 'SUBCATEGORYNAME',prd.ID AS 'PRODUCTID'
        FROM PRODUCT prd, CATEGORY cat WHERE prd.CATEGORY = cat.ID AND prd.ID = '$id';");
      while ($rows = $query->fetch_assoc()) {
          $this->category[] = $rows;
      }
      return $this->category;
  }*/

    /*public function insert_subCategory() {
        $sql    = "INSERT INTO CATEGORY (NAME, PARENTCATEGORY) VALUES
        ('{$this->name}','{$this->parentCategory}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    public function delete_subCategory($id) {
        $sql    = "DELETE FROM CATEGORY WHERE id='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }*/
}
?>
