<?php 
	error_reporting(0);
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
	if(isset($_POST["add_product"]))
	{	
			$cat= $_POST["category"];	
			
			$sql="select * from addalbum where album_id='$cat'";
			$res=mysqli_query($con,$sql);
			if(!$res)
			{
				die("Could Not Execute Query.".mysqli_error($con));
			}
			else
			{
				$fetch_album1=mysqli_fetch_assoc($res);
				
			}

	
		//usleep(100000);
		$name=$_FILES["image"]["name"];
		$up=array("jpeg","jpg","png","JPG","JPEG","PNG");
		$ex=explode(".",$name);
		$ex=end($ex);
		$category=$_POST["category"];
		
		if(in_array($ex,$up) && $_FILES["image"]["type"]=="image/jpeg" || $_FILES["image"]["type"]=="image/jpg" || $_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/JPG" || $_FILES["image"]["type"]=="image/JPEG" || $_FILES["image"]["type"]=="image/PNG")
		{
				function resize($filename_original, $filename_resized, $new_w, $new_h) 
				{
					$extension = pathinfo($filename_original, PATHINFO_EXTENSION);
				
					if ( preg_match("/jpg|jpeg|JPG|JPEG/", $extension) ) $src_img=@imagecreatefromjpeg($filename_original);
				
					if ( preg_match("/png|PNG/", $extension) ) $src_img=@imagecreatefrompng($filename_original);
				
					if(!$src_img) return false;
				
					$old_w = imageSX($src_img);
					$old_h = imageSY($src_img);
				
					$x_ratio = $new_w / $old_w;
					$y_ratio = $new_h / $old_h;
				
					if ( ($old_w <= $new_w) && ($old_h <= $new_h) ) {
						$thumb_w = $old_w;
						$thumb_h = $old_h;
					}
					elseif ( $y_ratio <= $x_ratio ) {
						$thumb_w = round($old_w * $y_ratio);
						$thumb_h = round($old_h * $y_ratio);
					}
					else {
						$thumb_w = round($old_w * $x_ratio);
						$thumb_h = round($old_h * $x_ratio);
					}		
				
				
					$thumb_w=$new_w;
					$thumb_h=$new_h;
				
					$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
					imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_w,$old_h); 
				
					if (preg_match("/png|PNG/",$extension)) imagepng($dst_img,$filename_resized); 
					else imagejpeg($dst_img,$filename_resized,100); 
				
					imagedestroy($dst_img); 
					imagedestroy($src_img);
				
					return true;
				}
			
				$name=$_FILES["image"]["name"];
				$up=array("jpeg","jpg","png","JPG","JPEG","PNG");
				$ex=explode(".",$name);
				$ex=end($ex);
				date_default_timezone_set("Asia/Kolkata");
				$rnm=date("YmdHis");
			
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$fetch_album1["album_name"]."/".$_FILES["image"]["name"]);
				resize("uploads/".$fetch_album1["album_name"]."/"."$name", "uploads/".$fetch_album1["album_name"]."/"."$name", "615", "400");
				rename("uploads/".$fetch_album1["album_name"]."/"."$name","uploads/".$fetch_album1["album_name"]."/"."$rnm.$ex");
	
				$name=$fetch_album1["album_name"]."/".$rnm.".".$ex;
				$category=$_POST["category"];
				//$album_id=$_REQUEST[$_SESSION["album_id"]];
				
				$sql="insert into gallery (album_id,gallery) values ('$category','$name')";
				$res=mysqli_query($con,$sql);
				if(!$res)
				{
					die("Could Not Execute Query.".mysqli_error($con));
				}
				else
				{
					$msg="Gallery Added Successfully.";
				}
			}
			else
			{
				echo "<script>alert('Select Only small jpg & png Extension Format.');</script>";
				echo "<script>window.location='gallery.php';</script>";	
			}	
	}

	if(isset($_REQUEST["edit_id"]))
	{
		$query_edit_product="select * from gallery where gallery_id=$_REQUEST[edit_id]";
		$res_edit_product=mysqli_query($con,$query_edit_product);
		if(!$res_edit_product)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			$fetch_edit_product=mysqli_fetch_assoc($res_edit_product);		
		}
	}
	
	if(isset($_POST["edit_product"]))
	{		
		sleep(2);
		$cat= $fetch_edit_product["album_id"];	
		
		$sql="select * from addalbum where album_id='$cat'";
		$res=mysqli_query($con,$sql);
		if(!$res)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			$fetch_album1=mysqli_fetch_assoc($res);
			
		}

		$name=$_FILES["image"]["name"];
		if($name=="")
		{
			$name=$fetch_edit_product["gallery"];
		}
		else
		{
			$name=$_FILES["image"]["name"];
			$ex=explode(".",$name);
			$ex=end($ex);
			$category=$fetch_edit_product["album_id"];	
		}
		$name=$_FILES["image"]["name"];
			$ex=explode(".",$name);
			$ex=end($ex);
			$category=$fetch_edit_product["album_id"];	
		
			function resize($filename_original, $filename_resized, $new_w, $new_h) 
			{
				$extension = pathinfo($filename_original, PATHINFO_EXTENSION);
			
				if ( preg_match("/jpg|jpeg|JPG|JPEG/", $extension) ) $src_img=@imagecreatefromjpeg($filename_original);
			
				if ( preg_match("/png|PNG/", $extension) ) $src_img=@imagecreatefrompng($filename_original);
			
				if(!$src_img) return false;
			
				$old_w = imageSX($src_img);
				$old_h = imageSY($src_img);
			
				$x_ratio = $new_w / $old_w;
				$y_ratio = $new_h / $old_h;
			
				if ( ($old_w <= $new_w) && ($old_h <= $new_h) ) {
					$thumb_w = $old_w;
					$thumb_h = $old_h;
				}
				elseif ( $y_ratio <= $x_ratio ) {
					$thumb_w = round($old_w * $y_ratio);
					$thumb_h = round($old_h * $y_ratio);
				}
				else {
					$thumb_w = round($old_w * $x_ratio);
					$thumb_h = round($old_h * $x_ratio);
				}		
			
			
				$thumb_w=$new_w;
				$thumb_h=$new_h;
			
				$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
				imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_w,$old_h); 
			
				if (preg_match("/png|PNG/",$extension)) imagepng($dst_img,$filename_resized); 
				else imagejpeg($dst_img,$filename_resized,100); 
			
				imagedestroy($dst_img); 
				imagedestroy($src_img);
			
				return true;
			}
			
		$name=$_FILES["image"]["name"];
		$ex=explode(".",$name);
		$ex=end($ex);
		$rnm=date("YmdHis");

			move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$fetch_album1["album_name"]."/".$_FILES["image"]["name"]);
			resize("uploads/".$fetch_album1["album_name"]."/"."$name", "uploads/".$fetch_album1["album_name"]."/"."$name", "615", "400");
			rename("uploads/".$fetch_album1["album_name"]."/"."$name","uploads/".$fetch_album1["album_name"]."/"."$rnm.$ex");
			unlink("uploads/".$fetch_edit_product["gallery"]);
		$name=$fetch_album1["album_name"]."/".$rnm.".".$ex;
		
		$query_edit_product="update gallery set album_id='$fetch_edit_product[album_id]',gallery='$name' where gallery_id='$_REQUEST[edit_id]'";
		$res_edit_product=mysqli_query($con,$query_edit_product);
		if(!$res_edit_product)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			echo "<script>alert('Successfully Updated.');</script>";
			echo "<script>window.location='gallery.php';</script>";
		}		
		
	}
?>
<!DOCTYPE html>
<html lang="en">
	<?php include("head.php"); ?>
	<body class="no-skin">
		<?php include("header.php"); ?>
		<div class="main-container ace-save-state" id="main-container">
            <div id="sidebar" class="sidebar responsive ace-save-state">
            
                            <ul class="nav nav-list">
                                <li class="">
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

                               <li class="active">
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
								Gallery
							</li>
   						</ul><!-- /.breadcrumb -->
					</div>
					
					<div class="page-content">					
						<div class="page-header">
								<?php if(!isset($_REQUEST["edit_id"]))
								{
								?>
						
								<h1>
									Add Gallery
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
									</small>
								</h1>
								<?php } ?>
                        		<?php if(isset($_REQUEST["edit_id"]))
								{
								?>
								<h1>
									Edit Gallery
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
									</small>
								</h1>
                                <?php } ?>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="col-xs-6">
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
									<?php 
										$gallery="select * from addalbum";
										$res_gallery=mysqli_query($con,$gallery);
										if(!$res_gallery)
										{
											die("Could Not Execute Query.".mysqli_error($con));		
										}
										else
										{
											$fetch_album=mysqli_fetch_assoc($res_gallery);
										}

									?>									
									<div class="form-group">
										<label class="col-sm-5 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">Select Category </label>
                                        <?php
										if(isset($_REQUEST["edit_id"]))
										{
											$gallery="select * from gallery where gallery.gallery_id=$_REQUEST[edit_id]";
											$res_gallery=mysqli_query($con,$gallery);
											if(!$res_gallery)
											{
												die("Could Not Execute Query.".mysqli_error($con));		
											}
											else
											{
												$fetch_gal=mysqli_fetch_assoc($res_gallery);	
											}
										}
										?>
										<div class="widget-body">
											<div class="widget-main">
													<div class="col-sm-7" style="padding-right:0;">
														<select type="text" name="category" class="col-md-12 form-control" <?php if(isset($_REQUEST["edit_id"])) {?> disabled <?php  } ?> required >
                                                        	<?php if(!isset($_REQUEST["edit_id"])) { ?>															
                                                            <option value=''>Select Category</option>
                                                            <?php } ?>
                                                        	<?php 
                                                           	 	$gallery="select * from addalbum";
																$res_gallery=mysqli_query($con,$gallery);
																if(!$res_gallery)
																{
																	die("Could Not Execute Query.".mysqli_error($con));		
																}
																else
																{
																	while($fetch_gallery=mysqli_fetch_assoc($res_gallery))
																	{	
																		echo "<option value='$fetch_gallery[album_id]'";
																		if(isset($_REQUEST["edit_id"]) && $fetch_gallery['album_id']==$fetch_gal['album_id'])	
																		{
																			echo " selected";
																		}
																		echo ">$fetch_gallery[album_name]</option>";		
																	}
																}
																
															?>
                                                            
                                                        </select>
                                                        
													</div>
																								
											</div>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-5 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">
                                        <?php if(isset($_REQUEST["edit_id"])) { ?> Edit Gallery <?php }else{ ?> Add Gallery <?php } ?> </label>
										<div class="widget-body">
											<div class="widget-main">
													<div class="form-group">
															<div class="col-sm-7">
																<input type="file" name="image" id="id-input-file-2" style="border: 1px solid #ccc; padding: 5px; width: 98%;" required />
															</div>
				
													</div>
												<?php 
													if(isset($_REQUEST["edit_id"]))
													{
													?>
													<div class="col-md-offset-2 col-md-9 col-sm-8" style="margin-top:7px;">
														<img src="uploads/<?php if(isset($_REQUEST["edit_id"])) { echo $fetch_edit_product["gallery"]; } ?>" height="100" width="100" >
													</div>
													<?php	
													}												
												?>
											</div>
										</div>
									</div>

									<div class="form-group">
									<div class="col-md-offset-5 col-md-7">								
										<?php
											if(isset($_REQUEST["edit_id"]))
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="edit_product">
														Edit Gallery										
												</button>
											<?php
											}
											else
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="add_product">
													Add Gallery										
												</button>
											<?php
											}
										?>
									</div>					
                                    </div>	</div>	
								</form>								
							</div> <!-- col-12 -->

							<div class="col-xs-12">
								<h3 class="header smaller lighter blue">Gallery Details</h3>

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
													Gallery
												</th>
												<th class="center">
													Edit
												</th>
												<th class="center">
													Delete
												</th>
												<th class="center">
												</th>
												
												<th class="center">
												</th>
											</tr>
										</thead>
										<tbody id="ajaxData">
										<?php 
											$select_product="select * from gallery,addalbum where gallery.album_id=addalbum.album_id order by gallery.gallery_id DESC";
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
														<td style="line-height:100px;">
															<?php echo $c; ?>
														</td>
                                                        <td style="line-height:100px;">
															<?php echo $fetch_product["album_name"]; ?>	
                                                       	</td>
														<td>
															<img src="uploads/<?php echo $fetch_product["gallery"]; ?>" width="100" height="100">											
														</td>
														<td style="line-height:100px;">
															<a href="gallery.php?edit_id=<?php echo $fetch_product["gallery_id"]; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
														</td>
														<td style="line-height:100px;">
															<a href="javascript: del_gallery(<?php echo $fetch_product["gallery_id"]; ?>)"><i class="ace-icon fa fa-trash-o bigger-130 red"></i></a>
														</td>
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
