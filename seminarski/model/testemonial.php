<?php

class Testemonial{

  public $testemonialID;
  public $ime;
  public $text;
  public $slika;

  function __construct() {

  }
  public function save($konekcija){

      $sql = "INSERT INTO Testemonials(ime,text,slika) VALUES('$this->ime','$this->text','$this->slika')";
      if($konekcija->query($sql)){
        return true;
      }

      return false;
  }

  public static function getAll($konekcija){
    $testemonials = [];
    $upit = "SELECT * FROM Testemonials";
    $rezultat = $konekcija->query($upit);
    while($jedanRed = $rezultat->fetch_assoc()){
      $t = new Testemonial();
      $t->testemonialID = $jedanRed['testemonialID'];
      $t->ime = $jedanRed['ime'];
      $t->text = $jedanRed['text'];
      $t->slika = $jedanRed['slika'];
      array_push($testemonials,$t);
    }
    return $testemonials;
  }



}

 ?>
