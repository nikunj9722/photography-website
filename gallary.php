<?php
$title ="Gallary";
include "menu.php";
require 'connect.php';
?>
<br>
<br>
<br>
<style type="text/css">
  body{
    line-height: 1.5!important;
  }
  @media (min-width: 768px) {
    .col-md-3 { max-width: 34.3333%;  }
    
  }
  @media (min-width: 992px){
    .col-md-3 { width: 34.3333%!important;  }

  }
  .demo-gallery ul li{
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
  }
  .thumbnail{
    padding: 0!important;
    border:none!important;
  }
  .demo-gallery>ul>li .gallery-heading{
    opacity: 1!important;
    padding: 5px!important;
    right: 0!important;
    left: 0!important;
  }
  .col-slim-7{
    padding: 0!important;
  }
</style>
    <!-- Slider -->
    <link href="admin/assets/css/combine.css" rel="stylesheet">
    <!-- Slider -->

<div class="container text-center">

    <section id="gallery">
                <div class="">
         

                    <div class="demo-gallery">
                        <?php
                  $query_select="select * from gallery,addalbum where addalbum.album_id=gallery.album_id group by gallery.album_id";
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
                      ?>
                                    <ul class="row list-unstyled row-slim-7 col-md-3 responsive" style="float:left;" id="lightgallery1<?php echo $c; ?>">
                                      <?php
                          $query_image="select * from gallery,addalbum where addalbum.album_id=gallery.album_id and gallery.album_id='$fetch_assoc[album_id]'";
                          $result_image=mysqli_query($con,$query_image);
                          if(!$result_image)
                          {
                            die(mysqli_error($con));
                          }
                          else
                          {
                            $count=1;
                            while($fetch_image=mysqli_fetch_assoc($result_image))
                            {
                              ?>
                                                    <li class="col-xs-6 col-md-12 col-slim-7 col-sm-4 <?php if($count!=1){ echo "disp-none"; } ?>" data-src="admin/uploads/<?php echo $fetch_image["gallery"]; ?>">
                                                        <a href="#" class="thumbnail">
                                                            <span>
                                                                <img class="img-responsive" alt="" data-src="admin/uploads/<?php echo $fetch_image["gallery"]; ?>" >
                                                            </span>
                                                        </a>
                                                        <?php 
                                  if($count==1)
                                  {
                                ?>
                                                        <div class="gallery-heading">
                                                            <p style="color:#fff; line-height:25px; text-align:center; font-size:15px; font-weight:600; letter-spacing:0.5px; margin-bottom:0;"><?php echo $fetch_image["album_name"]; ?></p> 
                                                            <span class="" rel="prettyPhoto">
                                                            </span>
                                                        </div>
                                                        <?php 
                                  }
                                ?>
                                                    </li>
                                                    <?php
                              $count++;
                            }
                          }
                        ?>
                                    </ul>
                                   <script>
                      $(document).ready(function(){$("#lightgallery1<?php echo $c; ?>").lightGallery({thumbnail:!0}),$(".view-webiste").click(function(e){return window.open($(this).attr("href")),!1}),$("#ourclient").carouFredSel({width:"100%",pagination:"#partner_carousel_pager",scroll:{duration:1e3}})});
                      </script>
                                    <?php
                      $c++;
                    }
                  }
                ?>
                    </div>
                </div>
            </section>
            <!-- gallery -->
            <script src="admin/assets/js/combine4c01.js?cache=1.0"></script>
          <!-- end gallery -->
</div>

</div>
<br>
<?php 
include "footer.php";
?>