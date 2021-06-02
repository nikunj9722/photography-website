<?php
$title="Wedding";
include "menu.php";
include "connect.php";
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<!--   <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
 -->
  <div class="carousel-inner">
    <?php
        $query_select="select * from service where service_id='$_REQUEST[id]'";
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
            <img class="d-block w-100" src="admin/uploads/services/<?php echo $img[0]; ?>" alt="<?php echo $fetch_assoc['title']; ?>">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="animate__animated animate__fadeInLeft" style="animation-delay:1s"><?php echo $fetch_assoc['title']; ?></h5>
            </div>
          </div>
        <?php $c++; }} ?>
        <?php
        $query_select="select * from service where service_id='$_REQUEST[id]'";
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
          $fruit = array_shift($img);
          foreach ($img as $key => $value) {
         ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="admin/uploads/services/<?php echo $value; ?>" alt="<?php echo $fetch_assoc['title']; ?>">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="animate__animated animate__zoomIn" style="animation-delay:1s" ><?php echo $fetch_assoc['title']; ?></h5>
              </div>
          </div>
        <?php $c++;}}} ?>
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
 <?php
        $query_select="select * from service where service_id='$_REQUEST[id]'";
        $result_select=mysqli_query($con,$query_select);
        if(!$result_select)
        {
          die(mysqli_error($con));
        }
        else
        {
          $fetch_assoc=mysqli_fetch_assoc($result_select);
         }          	
         ?>
<div class=" text-center">
  <div class="jumbotron" style="margin: 0;">
  	<h1 class="text-muted"><?php echo $fetch_assoc['sub_title']; ?></h1>
  		<p style="padding: 0 8pc;"><?php echo $fetch_assoc['description']; ?></p>
  </div>
</div>
<?php
include "footer.php";
?>