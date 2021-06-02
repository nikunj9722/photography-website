<?php
$title="Event";
include "menu.php";
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/e3.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="animate__animated animate__fadeInLeft" style="animation-delay:1s">Event</h5>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/e4.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="animate__animated animate__slideInDown" style="animation-delay:1s" >Event</h5>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/e2.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="animate__animated animate__zoomIn" style="animation-delay:1s" >Event</h5>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container text-center">
	<h3 class="text-muted">Event Photography</h3>
		<p>We understand the value of your event photography and have experience discretely covering intimate
    private events but can also scale up to shoot multi-city launch parties and incentive programs in multiple
    cities with our team of Associate photographers. Our team will make sure your event is documented in style and provide you with images that can be used for reportage, marketing and social media!</p>
</div>
<br>
<?php
include "footer.php";
?>