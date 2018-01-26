<?php
class usuarios_model {
  private $db;
  private $username;
  private $password;

  public function __construct(){
      $this->db=Conectar::conexion();
  }
  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function valida_usuario() {
    $sql = "SELECT * FROM USER WHERE USERNAME = '{$this->username}' AND PASSWORD = '{$this->password}'";
    $resultado = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
    if ($resultado->num_rows > 0) {
      while($row=$resultado->fetch_assoc()){
        return true;
      }
    } else {
        return false;
      }
  }

  public function crea_usuario() {
    $sql = "SELECT * FROM USER WHERE USERNAME = '{$this->username}' AND PASSWORD = '{$this->password}'";
    $resultado = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
    if ($resultado->num_rows > 0) {
      while($row=$resultado->fetch_assoc()){
        session_start();
        $_SESSION['user'] = $row['USERNAME'];
        return true;
      }
    } else {
        return false;
      }
  }
}

?>
