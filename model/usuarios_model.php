<?php
class usuarios_model {
  private $db;
  private $username, $password, $fullname, $email, $address, $zipCode, $password_check;

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

  public function getPasswordCheck() {
    return $this->password_check;
  }
  public function setPasswordCheck($password_check) {
    $this->password_check = $password_check;
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
      if(isset($this->username) && isset($this->password)) {
        $password = $this->password;
        $query = ("SELECT USERNAME, PASSWORD FROM USER WHERE USERNAME = '$this->username'");
        echo $query; exit();
        $passwd = mysqli_query($this->db,"SELECT PASSWORD FROM USER");
        $storedPasswd = Array();
        while ($row = mysqli_fetch_array($passwd, MYSQLI_ASSOC)) {
            $storedPasswd[] =  $row['PASSWORD'];
        }
      //  var_dump($storedPasswd); exit();
        $correct_password = password_verify($password, $row['PASSWORD']);
        if ($query->num_rows > 0) {
            if($correct_password){
            return true;
          }else{
          return false;
        }
      }else{
        return false;
      }
      }
    }

  public function crea_usuario() {
    $username = mysqli_real_escape_string($this->db, $this->username);
    $fullname = mysqli_real_escape_string($this->db, $this->fullname);
    $email = mysqli_real_escape_string($this->db, $this->email);
    $address = mysqli_real_escape_string($this->db, $this->address);
    $postalcode = mysqli_real_escape_string($this->db, $this->zipCode);
    // No escapamos las contraseñas dado que serán encriptadas y el usuario podría
    // introducir un caracter que luego no sería aceptado (se escaparía) por el método mysqli_real_escape_string.
    $password = $this->password;
    $password_check = $this->password_check;

    if(isset($username) && isset($fullname) && isset($email) && isset($address) && isset($postalcode) && isset($password) && isset($password_check)) {
      $salt = "$1$startCrypt";
      $hashed_password = crypt($password, $salt);
      $sql = "INSERT INTO USER (USERNAME, NAME, EMAIL, ADDRESS, POSTALCODE, PASSWORD) VALUES
        ('$username','$fullname','$email','$address','$postalcode','$hashed_password')";
        $result = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
      return true;
    } else {
      return false;
    }
  }
}
?>
