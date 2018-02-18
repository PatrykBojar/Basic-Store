<?php
/**
 * Gestiona las cateogrías desde la base de datos.
 */
class categorias_model {
    private $db;
    private $category;
    private $id, $name, $parentCategory;
    // GETTERS Y SETTERES
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
    /**
     * Hacemos la conexión.
     */
    public function __construct() {
        $this->db       = Conectar::conexion();
        $this->category = array();
    }
    /**
     * Obtenemos todas las cateogrías PADRE
     * @return array cateogrías padre.
     */
    public function get_categories() {
        $query = $this->db->query("SELECT * FROM CATEGORY WHERE PARENTCATEGORY IS NULL");
        while ($rows = $query->fetch_assoc()) {
            $this->category[] = $rows;
        }
        return $this->category;
    }

    /**
     * Obtenemos todas las subcategorías.
     * @return array subcategorías.
     */
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

    /**
     * Inserta una categoría padre.
     * @return mixed mensaje de error o boolean false.
     */
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
    /**
     * Elimina una cateogría padre.
     * @param  integer $id id de categoría.
     * @return mixed mensaje de error o boolean false.
     */
    public function delete_category($id) {
        $sql    = "DELETE FROM CATEGORY WHERE id='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    /**
     * Inserta una subcategoría.
     * @return mixed mensaje de error o boolean false.
     */
    public function insert_subCategory() {
        $sql    = "INSERT INTO CATEGORY (NAME, PARENTCATEGORY) VALUES
        ('{$this->name}','{$this->parentCategory}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
}
?>
