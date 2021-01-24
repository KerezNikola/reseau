<?php
require 'flight/Flight.php';
require 'jsonindent.php';

Flight::register('db', 'Database', array('reseau'));

Flight::route('/', function(){

	$curl = curl_init("http://api.openweathermap.org/data/2.5/weather?q=Belgrade&APPID=6ed5b817a20c9a16855a877246d38576");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$jsonOdgovor = curl_exec($curl);
	curl_close($curl);
	echo($jsonOdgovor);
});


Flight::route('GET /usluge', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiUsluge();

	$niz =  [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});
Flight::route('GET /testemoniali', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiTestemoniale();

	$niz =  [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /usluge/@id', function($id)
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->jednaUsluga($id);

	$niz =  [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /novaUsluga', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci = file_get_contents('php://input');
	$niz = json_decode($podaci,true);
	$db->unesiUslugu($niz);
	if($db->getResult())
	{
		echo "Uspesno";
	}
	else
	{
		echo  "Greska!";

	}

});

Flight::start();
?>
