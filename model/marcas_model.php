<?php
class marcas_model {
    private $db;
    private $brand;
    private $id, $name;

    public function __construct() {
        $this->db      = Conectar::conexion();
        $this->brand = array();
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

    public function get_brands() {
        $query = $this->db->query("SELECT * FROM BRAND");
        while ($rows = $query->fetch_assoc()) {
            $this->brand[] = $rows;
        }
        return $this->brand;
    }
    public function insert_brand() {
        $sql    = "INSERT INTO BRAND (NAME) VALUES ('{$this->name}')";
        $result = $this->db->query($sql);
        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    public function delete_brand($id) {
        $sql    = "DELETE FROM BRAND WHERE id='$id'";
        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }
    public function update_subbrand($id) {
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
