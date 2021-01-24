<?php
include 'sesija.php';
include 'konekcija.php';

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reseau</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
      include 'header.php';
   ?>

	<div id="about" class="section md-padding">

		<div class="container">
      <div class="section-header text-center">
        <h2 class="title">Graficki prikaz podataka</h2>
				<h4 id="rez"></h4>
      </div>
      <div id="piechart"></div>

		</div>

	</div>


	</div>

	<?php
		include 'footer.php';
	?>

	<div id="back-to-top"></div>

	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var podaci = [];
      var naslov = ["Usluga","Broj"];
      podaci.push(naslov);
      $.ajax({
        url: "podaci.php",
        success: function(json){
          $.each(JSON.parse(json),function(i,element){
            var niz = [element.name,parseInt(element.broj)];
            podaci.push(niz);
          })
          var data = google.visualization.arrayToDataTable(podaci);
          console.log(data);

          var options = {'title':'Broj usluga po cenovnom rangu', 'width':600, 'height':500,pieHole: 0.3};

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);

        }
      });

    }
</script>
</body>

</html>
