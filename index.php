<?php
 $title='Home';
 include 'menu.php';
 include 'connect.php';
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 <!--  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">
    <?php
        $query_select="select * from slider LIMIT 0,1";
        $result_select=mysqli_query($con,$query_select);
        if(!$result_select)
        {
          die(mysqli_error($con));
        }
        else
        {
          $c=1;
          while($fetch_assoc=mysqli_fetch_assoc($result_select))
          {
          $img = json_decode($fetch_assoc['img']);
         ?>
        <div class="carousel-item active">
            <img class="d-block w-100" src="admin/uploads/slider/<?php echo $img[0]; ?>" alt="<?php echo $fetch_assoc['title']; ?>">
            <div class="carousel-caption d-none d-md-block">
            <h5 class="animate__animated animate__fadeInLeft" style="animation-delay:1s"><?php echo $fetch_assoc['title']; ?></h5>
            <p class="animate__animated animate__fadeInRight" style="animation-delay:2s"><?php echo $fetch_assoc['desc']; ?></p>
          </div>
        </div>
      <?php $c++; }} ?>
      <?php
        $query_select="select * from slider LIMIT 1,10";
        $result_select=mysqli_query($con,$query_select);
        if(!$result_select)
        {
          die(mysqli_error($con));
        }
        else
        {
          $c=1;
          while($fetch_assoc=mysqli_fetch_assoc($result_select))
          {
          $img = json_decode($fetch_assoc['img']);
         ?>
        <div class="carousel-item">
            <img class="d-block w-100" src="admin/uploads/slider/<?php echo $img[0]; ?>" alt="<?php echo $fetch_assoc['title']; ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="animate__animated animate__fadeInLeft" style="animation-delay:1s;" ><?php echo $fetch_assoc['title']; ?></h5>
              <p class="animate__animated animate__fadeInRight" style="animation-delay:2s;"><?php echo $fetch_assoc['desc']; ?> </p>
            </div>
        </div>
      <?php $c++; }} ?>
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
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
  <h4 class="text-center text-muted"><span class="caret"></span>Stories and feelings photographer</h4>
  <hr class="my-4">
  <p class="text-muted text-center">
We are complex beings with simple souls, living a single life full of moments 
which are suspended in our memory. 
That is why photography fascinates me so much, being able to preserve part of that unique moment
and remember it infinite times </p>
<br>
<br>
<!--team-->
<h3 class="text-center team">TEAM PHOTOGRAPHY</h3>
<br>
<div class="card-deck text-center text-muted">
  <?php
    $query_select="select * from team";
    $result_select=mysqli_query($con,$query_select);
    if(!$result_select)
    {
      die(mysqli_error($con));
    }
    else
    {
      $c=1;
      while($fetch_assoc=mysqli_fetch_assoc($result_select))
      {
        $img = json_decode($fetch_assoc['img']);
       ?>
        <div class="card" style=" box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
          <img class="card-img-top" src="admin/uploads/team/<?php echo $img[0]; ?>"  alt="<?php echo $fetch_assoc['title']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $fetch_assoc['title']; ?></h5>
          </div>
        </div>
    <?php $c++; }} ?>
</div>

<!--team over-->
</div>
</div>
</div>
<br>
<?php
include "footer.php";
?>

