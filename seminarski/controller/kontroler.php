<?php
include '../sesija.php';
include '../model/usluga.php';
include '../model/testemonial.php';
include '../konekcija.php';

if(isset($_GET['operacija'])){
  if($_GET['operacija'] == 'usluge'){
      echo json_encode(Usluga::getAll($konekcija));
  }

  if($_GET['operacija'] == 'uslugeSort'){
      echo json_encode(Usluga::getAllSorted($konekcija,$_GET['sort']));
  }
  if($_GET['operacija'] == 'uslugeJedna'){
      echo json_encode(Usluga::getOne($konekcija,$_GET['id']));
  }

  if($_GET['operacija'] == 'testemonial'){
      echo json_encode(Testemonial::getAll($konekcija));
  }
  if($_GET['operacija'] == 'uslugeObrisi'){
    $id = $konekcija->real_escape_string(trim($_GET['id']));
    $usluga = new Usluga();
    $usluga->setUslugaID($id);
    if($usluga->delete($konekcija)){
      echo "Usluga vise nije u ponudi. Uspesno obrisana.";
    }else{
      echo "Neuspesno obrisana usluga.";
    }
  }
}

if(isset($_POST['usluga'])){

  if($_POST['operacija'] == "izmena"){
    $naziv = $konekcija->real_escape_string(trim($_POST['naziv']));
    $opis = $konekcija->real_escape_string(trim($_POST['opis']));
    $cena = $konekcija->real_escape_string(trim($_POST['cena']));
    $id = $konekcija->real_escape_string(trim($_POST['id']));

    $usluga = new Usluga();
    $usluga->setNazivUsluge($naziv);
    $usluga->setOpisUsluge($opis);
    $usluga->setCena($cena);
    $usluga->setUslugaID($id);

    $usluga->change($konekcija);
    header("Location: ../administracija.php");

  }else{
    $naziv = $konekcija->real_escape_string(trim($_POST['naziv']));
    $opis = $konekcija->real_escape_string(trim($_POST['opis']));
    $cena = $konekcija->real_escape_string(trim($_POST['cena']));

    $usluga = new Usluga();
    $usluga->setNazivUsluge($naziv);
    $usluga->setOpisUsluge($opis);
    $usluga->setCena($cena);

    $usluga->save($konekcija);
    header("Location: ../administracija.php");
  }
}



 ?>
