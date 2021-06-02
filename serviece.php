<?php
$title ="Services";
include "menu.php";
include "connect.php";
?>
<br>
<br>
<br>
<div class="container text-center">
  <div class="row">
      <?php
    $query_select="select * from service";
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
    <div class="col-md-4" style="margin-bottom: 20px;">
        <div class="card" style=" box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
           <a href="service_details.php?id=<?php echo $fetch_assoc['service_id']; ?>" class="<?php if($title == 'Weding') { echo 'active'; } ?>"><img height="232" class="card-img-top" src="admin/uploads/services/<?php echo $img[0]; ?>" alt="<?php echo $fetch_assoc['title']; ?>" title="click here for info <?php echo $fetch_assoc['title']; ?>"></a>
          <div class="card-body">
            <h5 class="card-title"><?php echo $fetch_assoc['title']; ?></h5>
          </div>
        </div>
    </div>
    <?php $c++; }} ?>
  </div>
</div>

<br>
<?php 
include "footer.php";
?>