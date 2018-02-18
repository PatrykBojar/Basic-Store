<?php
/**
 * Gestiona las marcas en la base de datos.
 */
class marcas_model {
    private $db;
    private $brand;
    private $id, $name;

    /**
     * Hacemos la conexión.
     */
    public function __construct() {
        $this->db    = Conectar::conexion();
        $this->brand = array();
    }
    // GETTERS Y SETTERES.
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

    /**
     * Obtenemos todas las marcas.
     * @return array marcas.
     */
    public function get_brands() {
        $query = $this->db->query("SELECT * FROM BRAND");
        while ($rows = $query->fetch_assoc()) {
            $this->brand[] = $rows;
        }
        return $this->brand;
    }
    /**
     * Obtenemos todas las parcas que tienen un prodcuto asignado.
     */
    public function BrandsWithPrd() {
        $query = $this->db->query("SELECT DISTINCT brd.NAME AS 'BRANDNAME',brd.ID AS 'BRANDID' FROM BRAND brd, PRODUCT prd WHERE prd.BRAND = brd.ID;");
        while ($rows = $query->fetch_assoc()) {
            $this->brand[] = $rows;
        }
        return $this->brand;
    }
    /**
     * Insertamos una marca a la base de datos.
     * @return mixed mensaje de error o boolean false.
     */
    public function insert_brand() {
        $sql    = "INSERT INTO BRAND (NAME) VALUES ('{$this->name}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    /**
     * Eliminamos una marca de la base de datos.
     * @param  integer $id id de la marca.
     * @return mixed mensaje de error o boolean false.
     */
    public function delete_brand($id) {
        $sql    = "DELETE FROM BRAND WHERE id='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
}
?>
