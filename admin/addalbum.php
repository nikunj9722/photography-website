<?php 
	session_start();
	include("connect.php");
	error_reporting(0);
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
	if(isset($_POST["add_product"]))
	{	
			$category=$_POST["category"];
			
			$sql="insert into addalbum (album_name) values ('$category')";
			$res=mysqli_query($con,$sql);
			if(!$res)
			{
				die("Could Not Execute Query.".mysqli_error($con));
			}
			else
			{
				mkdir("uploads/$category",0777);
				$msg="Album Added Successfully.";
			}
	}

	if(isset($_REQUEST["edit_id"]))
	{
		$query_edit_product="select * from addalbum where album_id=$_REQUEST[edit_id]";
		$res_edit_product=mysqli_query($con,$query_edit_product);
		if(!$res_edit_product)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			$fetch_edit_product=mysqli_fetch_assoc($res_edit_product);		
			//$_SESSION["aname"]=$fetch_edit_product["album_name"];
		}
	}
	
	if(isset($_REQUEST["edit_product"]))
	{
				$category=$_POST["category"];

				$query_edit_product="update addalbum set album_name='$category' where album_id=$_REQUEST[edit_id]";
				$res_edit_product=mysqli_query($con,$query_edit_product);
				if(!$res_edit_product)
				{
					die("Could Not Execute Query.".mysqli_error($con));
				}
				else
				{
					rename("uploads/".$fetch_edit_product['album_name'],"uploads/".preg_replace('/\s(?=([^"]*"[^"]*")*[^"]*$)/', '_',$category));
					echo "<script>alert('Successfully Updated.');</script>";
					echo "<script>window.location='addalbum.php';</script>";
				}		
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
                                <li class="">
                                    <a href="home.php">
                                        <i class="menu-icon fa fa-tachometer"></i>
                                        <span class="menu-text"> Home </span>
                                    </a>
                                    <b class="arrow"></b>
                                </li>
                               <li class="active">
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
								<a href="home.php">Home</a>
							</li>

							<li class="active">
								Album
							</li>
   						</ul><!-- /.breadcrumb -->
					</div>
					
					<div class="page-content">					
						<div class="page-header">
								<h1>
									<?php if(isset($_REQUEST["edit_id"])) { ?>
                                    Edit Album
                                    <?php }else{?>
                                    Add Album
                                    <?php } ?>
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
									</small>
								</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-8 center" style="color:#009900;font-weight:bold;">
											<?php 
												if(isset($msg))
												{
													echo $msg;
												}
											?>
										</div>										
									</div>
									
									<div class="form-group">
										<?php 
										if(isset($_REQUEST["edit_id"]))
										{
										?>
                                        	<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">Edit Album </label>
                                        <?php 
										}
										else
										{
											?>
										    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">Add Album </label>								  <?php	
										}
										?>
										<div class="widget-body">
											<div class="widget-main">
													<div class="col-sm-3">
														<input type="text" name="category" class="col-md-5 form-control" value="<?php if(isset($_REQUEST["edit_id"])) { echo $fetch_edit_product["album_name"]; } ?>" required >
	                                          		</div>
											</div>
										</div>
									</div>
                                    

									<div class="form-group">
									<div class="col-md-offset-2 col-md-10">								
										<?php
											if(isset($_REQUEST["edit_id"]))
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="edit_product">
														Edit Album										
												</button>
											<?php
											}
											else
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="add_product">
													Add Album										
												</button>
											<?php
											}
										?>
									</div>					
                                    </div>	
								</form>								
							</div> <!-- col-12 -->

							<div class="col-xs-12">
								<h3 class="header smaller lighter blue">Album Details</h3>

								<div class="clearfix">
									<div class="pull-right tableTools-container"></div>
								</div>
								<!-- div.table-responsive -->

								<!-- div.dataTables_borderWrap -->
								<div>

									<table id="dynamic-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													Sr No.
												</th>
                                                <th class="center">
													Album Name
												</th>
												<th class="center">
													Edit
												</th>
												<th class="center">
													Delete
												</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
											</tr>
										</thead>
										<tbody id="ajaxData">
                                        <?php 
                                        ?>
										<?php 
											$select_product="select * from addalbum order by album_id DESC";
											$res_product=mysqli_query($con,$select_product);
											if(!$res_product)
											{
												die("Could Not Execute Query.".mysqli_error($con));
											}
											else
											{
												$num_product=mysqli_num_rows($res_product);
												if($num_product>0)
												{
													$c=1;
													while($fetch_product=mysqli_fetch_assoc($res_product))
													{					
													?>
													<tr class="center">
														<td>
															<?php echo $c; ?>
														</td>
                                                        <td>
															<?php echo $fetch_product["album_name"]; ?>	
                                                       	</td>
														<td>
															<a href="addalbum.php?edit_id=<?php echo $fetch_product["album_id"]; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
														</td>
														<td>
                                                        	
															<a href="javascript: del_album(<?php echo $fetch_product["album_id"]; ?>)"><i class="ace-icon fa fa-trash-o bigger-130 red"></i></a>
														</td>
														<td></td>
                                                        <td></td>
                                                        <td></td>
													</tr>
													<?php
														$c++;
													}
												}
											}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div><!-- row -->
					</div><!-- page-content --> 
				</div> 
			</div><!-- /.page-header -->	
	
			<?php include("footer.php"); ?>
		</div><!-- /.main-content -->
		
	</body>
</html>
