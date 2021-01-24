<?php

class Usluga{

  public $uslugaID;
  public $nazivUsluge;
  public $opisUsluge;
  public $cena;

  function __construct() {

  }

  public function setUslugaID($uslugaID){
    $this->uslugaID = $uslugaID;
  }
  public function setNazivUsluge($nazivUsluge){
    $this->nazivUsluge = $nazivUsluge;
  }
  public function setOpisUsluge($opisUsluge){
    $this->opisUsluge = $opisUsluge;
  }
  public function setCena($cena){
    $this->cena = $cena;
  }
  public function getUslugaID(){
    return $this->uslugaID;
  }
  public function getNazivUsluge(){
    return $this->nazivUsluge;
  }
  public function getOpisUsluge(){
    return $this->opisUsluge;
  }
  public function getCena(){
    return $this->cena;
  }

  public function save($konekcija){

      $sql = "INSERT INTO Usluge(nazivUsluge,opis,cena) VALUES('$this->nazivUsluge','$this->opisUsluge',$this->cena)";
      $podaci = [
        "naziv" => $this->nazivUsluge,
        "opis" => $this->opisUsluge,
        "cena" => $this->cena
      ];

        $json = json_encode($podaci);
  			$curl = curl_init("http://localhost/reseau/api/novaUsluga");
  			curl_setopt($curl, CURLOPT_POST, TRUE);
  			curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
  			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  			$jsonOdgovor = curl_exec($curl);
  			curl_close($curl);
  			if($jsonOdgovor == "Uspesno") {
          return true;
  			}

      return false;
  }

  public function change($konekcija){

      $sql = "UPDATE Usluge SET nazivUsluge='$this->nazivUsluge',opis='$this->opisUsluge',cena=$this->cena where uslugaID=$this->uslugaID";
      if($konekcija->query($sql)){
        return true;
      }

      return false;
  }

  public function delete($konekcija){

      $sql = "DELETE FROM Usluge where uslugaID=$this->uslugaID";
      if($konekcija->query($sql)){
        return true;
      }

      return false;
  }

  public static function getAll($konekcija){
    $usluge = [];
    $upit = "SELECT * FROM usluge";
    $rezultat = $konekcija->query($upit);
    while($jedanRed = $rezultat->fetch_assoc()){
      $usluga = new Usluga();
      $usluga->setUslugaID($jedanRed['uslugaID']);
      $usluga->setNazivUsluge($jedanRed['nazivUsluge']);
      $usluga->setOpisUsluge($jedanRed['opis']);
      $usluga->setCena($jedanRed['cena']);
      array_push($usluge,$usluga);
    }
    return $usluge;
  }

  public static function getAllSorted($konekcija,$sort){

    $order = "";

    if($sort == 'rastuce'){
      $order = " order by cena asc";
    }
    if($sort == 'opadajuce'){
      $order = " order by cena desc";
    }

    $usluge = [];
    $upit = "SELECT * FROM usluge ".$order;
    $rezultat = $konekcija->query($upit);
    while($jedanRed = $rezultat->fetch_assoc()){
      $usluga = new Usluga();
      $usluga->setUslugaID($jedanRed['uslugaID']);
      $usluga->setNazivUsluge($jedanRed['nazivUsluge']);
      $usluga->setOpisUsluge($jedanRed['opis']);
      $usluga->setCena($jedanRed['cena']);
      array_push($usluge,$usluga);
    }
    return $usluge;
  }

  public static function getOne($konekcija,$id){

    $upit = "SELECT * FROM usluge where uslugaID=$id";
    $rezultat = $konekcija->query($upit);
    $usluga = new Usluga();
    while($jedanRed = $rezultat->fetch_assoc()){

      $usluga->setUslugaID($jedanRed['uslugaID']);
      $usluga->setNazivUsluge($jedanRed['nazivUsluge']);
      $usluga->setOpisUsluge($jedanRed['opis']);
      $usluga->setCena($jedanRed['cena']);
    }
    return $usluga;
  }

}

 ?>
