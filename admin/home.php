<?php 
	session_start();
	include("connect.php");
	
	if(!isset($_SESSION["u_name"]))
	{
		header("location:index.php");
	}
	else
	{
		$_SESSION["photo_art"]=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
?>

<!DOCTYPE html>
<html lang="en">
	
	<?php include("head.php"); ?>
    <style type="text/css">
        .panel-heading{
            padding: 45px 35px;
        }
    </style>
	<body class="no-skin">
		<?php include("header.php"); ?>
		<div class="main-container ace-save-state" id="main-container">
            <div id="sidebar" class="sidebar responsive ace-save-state">
                <ul class="nav nav-list">
                    <li class="active">
                        <a href="home.php">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Home </span>
                        </a>
                        <b class="arrow"></b>
                    </li>

                   <li class="">
                        <a href="addalbum.php">
                            <i class="menu-icon fa fa-pencil-square-o"></i>

                            <span class="menu-text">
                                Album
                            </span>
                        </a>
                    </li>

                   <li class="">
                        <a href="gallery.php">
                            <i class="menu-icon fa fa-picture-o"></i>

                            <span class="menu-text">
                                Gallery
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="services.php">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text">
                                Services
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="team.php">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text">
                                Team
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="slider.php">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text">
                                Slider
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="contact_list.php">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text">
                                Contact Details
                            </span>
                        </a>
                    </li>
	              </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
                        
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li class="active">
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>
				</div>
                  <div class="container">
                    <row>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="panel-group">
                                    <br>
                                      <a href="services.php" style="text-decoration: none;">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Services</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.service_id) as id1 from service s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel-group">
                                    <br>
                                      <a href="addalbum.php" style="text-decoration: none;">
                                        <div class="panel panel-info">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Album</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;color: #fff;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.album_id) as id1 from addalbum s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel-group">
                                    <br>
                                      <a href="gallery.php" style="text-decoration: none;">
                                        <div class="panel panel-success">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Gallery</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;color: #fff;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.gallery_id) as id1 from gallery s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel-group">
                                      <a href="team.php" style="text-decoration: none;">
                                        <div class="panel panel-info">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Team</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;color: #fff;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.id) as id1 from team s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel-group">
                                      <a href="slider.php" style="text-decoration: none;">
                                        <div class="panel panel-danger">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Slider</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;color: #fff;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.id) as id1 from slider s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                           <div class="col-md-4">
                                <div class="panel-group">
                                      <a href="contact_list.php" style="text-decoration: none;">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center"><h3 style="margin: 0;">Total Contact</h3>
                                            <br>
                                            <span style="background: #000;border-radius: 22px;padding:3% 3.5%;color: #fff;">
                                                <?php 
                                                    $query_edit_product="select *,count(s.id) as id1 from contact s";
                                                    $res_edit_product=mysqli_query($con,$query_edit_product);
                                                    if(!$res_edit_product)
                                                    {
                                                        die("Could Not Execute Query.".mysqli_error($con));
                                                    }
                                                    else
                                                    {
                                                        $fetch_edit_product=mysqli_fetch_assoc($res_edit_product); 
                                                        echo $fetch_edit_product['id1'];     
                                                    }
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                           
                          </div>
                      </div>
                    </row>
                </div>
                
			</div><!-- /.page-header -->	
	
			<?php include("footer.php"); ?>
		</div><!-- /.main-content -->
		
	</body>
</html>
