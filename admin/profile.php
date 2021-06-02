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
<?php
	
	if(isset($_REQUEST["add_profile"]))
	{
		$query_login="update admin set name='$_POST[username]',password='$_POST[password]'";
		$res_login=mysqli_query($con,$query_login);
		if(!$res_login)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{			
			$msg="Profile Updated.";
			echo "<script>alert('Profile Updated');</script>";
			echo "<script>window.location='home.php';</script>";
		}
		
	}
	
		$query_login="select * from admin";
		$res_login=mysqli_query($con,$query_login);
		if(!$res_login)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			$fetch=mysqli_fetch_assoc($res_login);
		}
?>

<!DOCTYPE html>
<html lang="en">
	
	<?php include("head.php"); ?>

	<body class="no-skin">
		<?php include("header.php"); ?>
		
<div class="main-container ace-save-state" id="main-container">

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            
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
								<a href="#">Admin Profile</a>
							</li>

						</ul><!-- /.breadcrumb -->

					</div>
					
					<div class="page-content">					
						<div class="page-header">
								<h1>
									Admin Profile
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
									</small>
								</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-7 center" style="color:#009900;font-weight:bold;font-size:16px;letter-spacing:1px;">
											<?php 
												if(isset($msg))
												{
													echo $msg;
												}
											?>
										</div>										
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> User Name </label>
			
										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Username" name="username" class="col-xs-10 col-sm-5" required value="<?php echo $fetch["name"]; ?>" />
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Password </label>
			
										<div class="col-sm-9">
											<input type="password" id="form-field-1-1" placeholder="Password" name="password" class="col-xs-10 col-sm-5" value="<?php echo $fetch["password"]; ?>" >
										</div>
									</div>
									
									<div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">								
                                    
                                            <button class="btn btn-info" style="border-radius:5px;" type="submit" name="add_profile" >
                                                Change profile									
                                            </button>
                                     
                                        </div>					
                                    </div>	
								</form>													
							</div> <!-- col-12 -->

						</div><!-- row -->
					</div><!-- page-content --> 
				</div> 
			</div><!-- /.page-header -->	
			
			<?php include("footer.php"); ?>
		</div><!-- /.main-content -->
		
	</body>
</html>
