<?php
include 'sesija.php';
include 'konekcija.php';
$poruka = "";
if(isset($_POST['login'])){
  $user = $konekcija->real_escape_string(trim($_POST['username']));
  $pass = $konekcija->real_escape_string(trim($_POST['password']));
  if(User::login($konekcija,$user,$pass)){
    $poruka = "Uspesno ulogovani korisnik";
  }else{
    $poruka = "Neuspesno logovanje";
  }

}
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

      <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
          <div class="text-center">
              <h1><i class="fa fa-pencil"></i> - Login forma</h1>
              <form method="POST" action="">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <label for="submit"></label>
                <input type="submit" name="login" value="Login" class="btn btn-lg btn-default">
              </form>
              <?php echo $poruka; ?>
          </div>

      </div>

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

  <script>
      function vratiSveUsluge(){
          $.ajax({
            url: "controller/kontroler.php",
            data: {operacija:'usluge'},
            method: "GET",
            success: function(result){
							var nalepi = "";
							console.log(result);
							$.each(JSON.parse(result),function(i,obj){
								nalepi+='<div class="col-md-6 col-sm-6">';
								nalepi+='<div class="service">';
								nalepi+='<i class="fa fa-pencil"></i>';
								nalepi+='<h3>'+obj.nazivUsluge+'</h3>';
								nalepi+='<p>'+obj.opisUsluge+'</p>';
								nalepi+='<p>Cena: <b>'+obj.cena+' eura</b></p>';
								nalepi+='</div>';
								nalepi+='</div>';
							});

							$("#usluge").html(nalepi);
            }
          });

      }

      vratiSveUsluge();
   </script>

	 <script>
       function vratiSveUslugeSortirano(sort){
           $.ajax({
             url: "controller/kontroler.php",
             data: {operacija:'uslugeSort',sort:sort},
             method: "GET",
             success: function(result){
 							var nalepi = "";
 							console.log(result);
 							$.each(JSON.parse(result),function(i,obj){
 								nalepi+='<div class="col-md-6 col-sm-6">';
 								nalepi+='<div class="service">';
 								nalepi+='<i class="fa fa-pencil"></i>';
 								nalepi+='<h3>'+obj.nazivUsluge+'</h3>';
 								nalepi+='<p>'+obj.opisUsluge+'</p>';
 								nalepi+='<p>Cena: <b>'+obj.cena+' eura</b></p>';
 								nalepi+='</div>';
 								nalepi+='</div>';
 							});

 							$("#usluge").html(nalepi);
             }
           });

       }

    </script>
		<script>
	      function vratiSveTestemoniale(){
	          $.ajax({
	            url: "controller/kontroler.php",
	            data: {operacija:'testemonial'},
	            method: "GET",
	            success: function(result){
								var nalepi = "";
								console.log(result);
								$.each(JSON.parse(result),function(i,obj){
									nalepi+='<div class="testimonial">';
									nalepi+='<div class="testimonial-meta">';
									nalepi+='<img src="slike/'+obj.slika+'" alt="">';
									nalepi+='<h3 class="white-text">'+obj.ime+'</h3>';
									nalepi+='<span>Klijent</span>';
									nalepi+='</div>';
									nalepi+='<p class="white-text">'+obj.text+'</p>';
									nalepi+='</div>';
								});

								$("#testimonial-slider").html(nalepi);



									$('#testimonial-slider').owlCarousel({
										loop:true,
										margin:15,
										dots : true,
										nav: false,
										autoplay : true,
										responsive:{
											0: {
												items:1
											},
											992:{
												items:2
											}
										}
									});

	            }
	          });

	      }

	      vratiSveTestemoniale();
	   </script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
		<script>
	    var get_latitude = $('#google-map').data('latitude');
		 var get_longitude = $('#google-map').data('longitude');

		 function initialize_google_map() {
				 var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
				 var mapOptions = {
						 zoom: 14,
						 scrollwheel: false,
						 center: myLatlng,
	           styles: [
							    {
							        "featureType": "administrative",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "color": "#7f2200"
							            },
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
							        "featureType": "administrative",
							        "elementType": "geometry.stroke",
							        "stylers": [
							            {
							                "visibility": "on"
							            },
							            {
							                "color": "#87ae79"
							            }
							        ]
							    },
							    {
							        "featureType": "administrative",
							        "elementType": "labels.text.fill",
							        "stylers": [
							            {
							                "color": "#495421"
							            }
							        ]
							    },
							    {
							        "featureType": "administrative",
							        "elementType": "labels.text.stroke",
							        "stylers": [
							            {
							                "color": "#ffffff"
							            },
							            {
							                "visibility": "on"
							            },
							            {
							                "weight": 4.1
							            }
							        ]
							    },
							    {
							        "featureType": "administrative.neighborhood",
							        "elementType": "labels",
							        "stylers": [
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
							        "featureType": "landscape",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "color": "#abce83"
							            }
							        ]
							    },
							    {
							        "featureType": "landscape.man_made",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "color": "#bae77b"
							            }
							        ]
							    },
							    {
							        "featureType": "poi",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "color": "#769E72"
							            }
							        ]
							    },
							    {
							        "featureType": "poi",
							        "elementType": "labels.text.fill",
							        "stylers": [
							            {
							                "color": "#7B8758"
							            }
							        ]
							    },
							    {
							        "featureType": "poi",
							        "elementType": "labels.text.stroke",
							        "stylers": [
							            {
							                "color": "#EBF4A4"
							            }
							        ]
							    },
							    {
							        "featureType": "poi.park",
							        "elementType": "geometry",
							        "stylers": [
							            {
							                "visibility": "simplified"
							            },
							            {
							                "color": "#8dab68"
							            }
							        ]
							    },
							    {
							        "featureType": "road",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "visibility": "simplified"
							            }
							        ]
							    },
							    {
							        "featureType": "road",
							        "elementType": "labels.text.fill",
							        "stylers": [
							            {
							                "color": "#5B5B3F"
							            }
							        ]
							    },
							    {
							        "featureType": "road",
							        "elementType": "labels.text.stroke",
							        "stylers": [
							            {
							                "color": "#ABCE83"
							            }
							        ]
							    },
							    {
							        "featureType": "road",
							        "elementType": "labels.icon",
							        "stylers": [
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
							        "featureType": "road.highway",
							        "elementType": "geometry",
							        "stylers": [
							            {
							                "color": "#EBF4A4"
							            }
							        ]
							    },
							    {
							        "featureType": "road.arterial",
							        "elementType": "geometry",
							        "stylers": [
							            {
							                "color": "#9BBF72"
							            }
							        ]
							    },
							    {
							        "featureType": "road.local",
							        "elementType": "geometry",
							        "stylers": [
							            {
							                "color": "#A4C67D"
							            }
							        ]
							    },
							    {
							        "featureType": "transit",
							        "elementType": "all",
							        "stylers": [
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
							        "featureType": "water",
							        "elementType": "geometry",
							        "stylers": [
							            {
							                "visibility": "on"
							            },
							            {
							                "color": "#aee2e0"
							            }
							        ]
							    }
							]

				 };
				 var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
				 var marker = new google.maps.Marker({
						 position: myLatlng,
						 map: map
				 });
		 }
		 google.maps.event.addDomListener(window, 'load', initialize_google_map);
	  </script>
</body>

</html>
