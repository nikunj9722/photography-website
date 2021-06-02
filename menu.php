

<?php
  session_start();
  // print_r($_SESSION['user']);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/logo.jpg" type="image/jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-lightbox.min.js">
    <link rel="stylesheet" type="text/css" href="assets/font/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <title>Photography || <?php echo $title ?></title>
    <style type="text/css">
      .dropdown-content {
        display: none;
        position: absolute;
        min-width: 80px;
        right:11px;
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 8px 9px;
        text-decoration: none;
        display: block;
      }
      .dropdown-content a:hover {background-color: #ddd;}
      .dropdown:hover .dropdown-content {display: block;}

    </style>
  </head>
  <body>
    <!-- nav-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="index.php">
        <img src="assets/logo1.png" width="50px" height="50px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link <?php if($title == 'Home') { echo 'active'; } ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($title == 'Services') { echo 'active'; } ?>" href="serviece.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($title == 'Gallary') { echo 'active'; } ?>" href="gallary.php">Gallary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($title == 'Conatc US') { echo 'active'; } ?> " href="contac.php">Contact us</a>
          </li>
           <li class="nav-item">
            <?php if(isset($_SESSION['user'])){ ?>
              <div class="dropdown">
                  <a class="nav-link dropbtn dropdown-toggle"><?php echo $_SESSION['user']['name']; ?></a>
                  <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                  </div>
              </div>
                <a class="nav-link <?php if($title == 'Login US || Sign up') { echo 'active'; } ?> " href="login1.php"></a>
            <?php }else{ ?>
                <a class="nav-link <?php if($title == 'Login US || Sign up') { echo 'active'; } ?> " href="login1.php">Login us</a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </nav>
<!--end menu-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.slim.min.js" ></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/lightbox.min.js"></script>
  </body>
</html>