<?php
class usuarios_model {
  private $db;
  private $username, $password, $fullname, $email, $address, $zipCode;

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

  public function getFullname() {
    return $this->fullname;
  }
  public function setFullname($fullname) {
    $this->fullname = $fullname;
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($email) {
    $this->email = $email;
  }

  public function getAddress() {
    return $this->address;
  }
  public function setAddress($address) {
    $this->address = $address;
  }

  public function getZipcode() {
    return $this->zipCode;
  }
  public function setZipcode($zipCode) {
    $this->zipCode = $zipCode;
  }

  public function valida_usuario() {
    $sql = "SELECT USERNAME, PASSWORD FROM USER WHERE USERNAME = '{$this->username}'";
    $result = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
    $row = mysqli_fetch_assoc($sql);
    $valid_password = password_verify($this->password, $row['PASSWORD']);
    if($sql->num_rows > 0) {
      if ($valid_password) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function crea_usuario() {

    $username = mysqli_real_escape_string($this->db, $this->username);
    $name = mysqli_real_escape_string($this->db, $this->fullname);
    $email = mysqli_real_escape_string($this->db, $this->email);
    $address = mysqli_real_escape_string($this->db, $this->address);
    $postalcode = mysqli_real_escape_string($this->db, $this->zipCode);
    $password = mysqli_real_escape_string($this->db, $this->password);
/*
    $sql = "INSERT INTO USER (USERNAME, NAME, EMAIL, ADDRESS, POSTALCODE, PASSWORD) VALUES
      ('$username','$name','$email','$address','$postalcode','$password')";
    $result = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
    if ($result->num_rows > 0) {
      while($row=$result->fetch_assoc()){
        return true;
      }
    } else {
        return false;
      }
  }*/
  $salt = "$1$encriptat";
     $hashed_password = crypt($password, $salt);
     $sql = "INSERT INTO USER (USERNAME, NAME, EMAIL, ADDRESS, POSTALCODE, PASSWORD) VALUES
       ('$username','$name','$email','$address','$postalcode','$hashed_password')";
       $result = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
       if ($result) {
         return true;
       }else{
         return false;
       }
}
}

?>
