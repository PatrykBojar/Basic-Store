<?php
class imagenes_model {
  private $db;
  private $id, $imgUrl, $isCarousel;

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

  public function setImgUrl($imgUrl) {
      $this->imgUrl = $imgUrl;
  }
  public function getImgUrl() {
      return $this->$setImgUrl;
  }

  public function setCarousel($isCarousel) {
      $this->isCarousel = $isCarousel;
  }
  public function getCarousel() {
      return $this->$isCarousel;
  }

public function get_img(){
  $query = $this->db->query("SELECT * FROM IMAGE;");
  while ($rows = $query->fetch_assoc()) {
      $this->product[] = $rows;
  }
  return $this->product;
}
  public function insert_image(){
    $img_url      = $this->imgUrl;
    $id     = $this->id;
    $isCarousel     = $this->isCarousel;

    $query = ("INSERT INTO IMAGE (URL, PRODUCT, CAROUSEL) VALUES ('$img_url', '$id', '$isCarousel');");
    $result = $this->db->query($query);

    if ($this->db->error)
        return "$query<br>{$this->db->error}";
    else {
        return false;
    }

  }
}
 ?>
