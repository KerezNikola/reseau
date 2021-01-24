<header id="home">
  <div class="bg-img" style="background-image: url('./img/background1.jpg');">
    <div class="overlay"></div>
  </div>

  <nav id="nav" class="navbar nav-transparent">
    <div class="container">

      <div class="navbar-header">
        <div class="navbar-brand">
          <a href="index.php">
            <img class="logo" src="img/logo.png" alt="logo">
          </a>
        </div>
        <div class="nav-collapse">
          <span></span>
        </div>
      </div>

      <ul class="main-nav nav navbar-nav navbar-right">
        <li><a href="index.php">Pocetna</a></li>
        <?php
            if(isset($_SESSION['user']) && $_SESSION['user']->ulogovan){
                if($_SESSION['user']->isAdmin){
                  ?>
                  <li><a href="administracija.php">Administracija</a></li>
                  <?php
                }

                ?>
                <li><a href="vizuelizacija.php">Graficki prikaz podataka</a></li>
                <li><a href="logout.php">LogOut</a></li>
                <?php
            }else{
              ?>
              <li><a href="registracija.php">Registracija</a></li>
              <li><a href="login.php">LogIn</a></li>
              <?php
            }

        ?>

      </ul>
    </div>
  </nav>

  <div class="home-wrapper">
    <div class="container">
      <div class="row">

        <div class="col-md-10 col-md-offset-1">
          <div class="home-content">
            <h1 class="white-text">Mi smo Reseau</h1>
            <p class="white-text">Mi smo ovde da vas digitalni svet postane setnja parkom, jer najbolji brinu o vama
            </p>

          </div>
        </div>

      </div>
    </div>
  </div>

</header>
