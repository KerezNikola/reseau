<?php
include 'konekcija.php';
$upit = "SELECT * from usluge";

$brojacIspod500 = 0;
$brojac500Do1000 = 0;
$brojacPreko1000 = 0;

$rezultat = $konekcija->query($upit);
$niz = [];
while($red = $rezultat->fetch_assoc()){
  if(intval($red['cena']) < 500){
    $brojacIspod500++;
  }
  if(intval($red['cena']) < 1000 && intval($red['cena']) > 500){
    $brojac500Do1000++;
  }

  if(intval($red['cena']) > 1000){
    $brojacPreko1000++;
  }
}
$niz[0] = new Helper("Usluge ispod 500 eura",$brojacIspod500);
$niz[1] =new Helper("Usluge od 500 do 1000",$brojac500Do1000);
$niz[2] = new Helper("Usluge preko 1000 eura",$brojacPreko1000);

echo(json_encode($niz));


class Helper{
  public $name;
  public $broj;

  public function __construct($name,$broj){
    $this->name = $name;
    $this->broj = $broj;
  }

}
 ?>
