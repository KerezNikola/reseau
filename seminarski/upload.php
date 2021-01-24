<?php
include 'konekcija.php';
$target_dir = "slike/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Vec postoji taj fajl!!!";
}else{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $ime = $_POST['ime'];
      $text = $_POST['text'];
      $slika = basename($_FILES["fileToUpload"]["name"]);
      if($konekcija->query("INSERT INTO testemonials(ime,text,slika) VALUES ('$ime','$text','$slika')")){
        header("Location:administracija.php");
      }else{
        echo("Neuspesno ubacivanje u bazu");
      }
  }
}

?>
