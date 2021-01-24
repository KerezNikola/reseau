<?php

class User{

  public $userID;
  public $imePrezime;
  public $username;
  public $password;
  public $isAdmin;
  public $ulogovan;

  function __construct() {

  }

  public static function login($konekcija,$user,$pass){

    $upit = "SELECT * FROM user where username='$user' and password='$pass'";
    $rezultat = $konekcija->query($upit);
    while($jedanRed = $rezultat->fetch_assoc()){
      $user = new User();
      $user->userID = $jedanRed['userID'];
      $user->imePrezime = $jedanRed['imePrezime'];
      $user->username = $jedanRed['username'];
      $user->password = $jedanRed['password'];
      $user->isAdmin = $jedanRed['isAdmin'] == "1" ? true : false;
      $user->ulogovan = true;

      $_SESSION['user'] = $user;

      return true;
    }
    return false;
  }

  public function save($konekcija){
    $sql = "INSERT INTO user(imePrezime,username,password) VALUES('$this->imePrezime','$this->username','$this->password')";
    if($konekcija->query($sql)){
      return true;
    }

    return false;
  }


}

 ?>
