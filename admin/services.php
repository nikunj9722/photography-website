<?php 
	session_start();
	error_reporting(0);
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
			$title=$_POST["title"];
			$sub_title=$_POST["sub_title"];
			$description=$_POST["description"];
			
			sleep(5);	
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

			$target_dir='uploads/services/';
			$img1 = 0;
			foreach($_FILES["img"]["name"] as $sing_img)
			{
				$target_file = $target_dir . $sing_img;
				$explode = explode(".",$sing_img);
				$ex = end($explode);
				$rnm = rand(date('HisYmd'),date('Ymdhis'));
				$img = $rnm.'.'.$ex;
				$item[] = $img;
				if(move_uploaded_file($_FILES["img"]["tmp_name"][$img1], $target_file))
				{
					// resize($target_file, $target_file, "815", "500");
					rename($target_dir.$sing_img,$target_dir.$img);
				} 
				$img1++;
			}
			if($sing_img!='')
			{		
				$sdata =  json_encode($item, JSON_UNESCAPED_SLASHES);
				$get_slider_update = "select * from service where service_id=$_REQUEST[edit_id]";
				$img = json_decode($get_slider_update['img']);
				foreach ($img as $single_img) 
				{
					unlink($target_dir.$single_img);
				}
			} 
			
			$sql = "insert into service (title,sub_title,description,img) values ('$title','$sub_title','$description','$sdata')";
			$res=mysqli_query($con,$sql);
			if(!$res)
			{
				die("Could Not Execute Query.".mysqli_error($con));
			}
			else
			{
				$msg="Service Added Successfully.";				
			}
	}

	if(isset($_REQUEST["edit_id"]))
	{
		$query_edit_product="select * from service where service_id=$_REQUEST[edit_id]";
		$res_edit_product=mysqli_query($con,$query_edit_product);
		if(!$res_edit_product)
		{
			die("Could Not Execute Query.".mysqli_error($con));
		}
		else
		{
			$fetch_edit_product=mysqli_fetch_assoc($res_edit_product);		
			//$_SESSION["album_id"]=$fetch_edit_product["album_id"];
		}
	}
	
	if(isset($_POST["edit_product"]))
	{
			$title = $_POST["title"];
			$sub_title = $_POST["sub_title"];
			$description = $_POST["description"];

			sleep(5);
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
			$target_dir='uploads/services/';
			$img1 = 0;
			foreach($_FILES["img"]["name"] as $sing_img)
			{
				$target_file = $target_dir . $sing_img;
				$explode = explode(".",$sing_img);
				$ex = end($explode);
				$rnm = rand(date('HisYmd'),date('Ymdhis'));
				$img = $rnm.'.'.$ex;
				$item[] = $img;
				if(move_uploaded_file($_FILES["img"]["tmp_name"][$img1], $target_file))
				{
					// resize($target_file, $target_file, "815", "500");
					rename($target_dir.$sing_img,$target_dir.$img);
					//echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
				} 
				$img1++;
			}
			if($sing_img!='')
			{		
				$target_dir='uploads/services/';
				$sdata =  json_encode($item, JSON_UNESCAPED_SLASHES);
				$img = json_decode($fetch_edit_product['img']);
				foreach ($img as $single_img) 
				{
					unlink($target_dir.$single_img);
				}
			}else{
				$sdata = $fetch_edit_product['img'];
			} 
			$query_edit_product = "update service set title='$title',sub_title='$sub_title',description='$description',img='$sdata' where service_id=$_REQUEST[edit_id]";
			$res_edit_product = mysqli_query($con,$query_edit_product);
			if(!$res_edit_product)
			{
				die("Could Not Execute Query.".mysqli_error($con));
			}
			else
			{
				echo "<script>alert('Successfully Updated.');</script>";
				echo "<script>window.location='services.php';</script>";
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
								Service
							</li>
   						</ul><!-- /.breadcrumb -->
					</div>
					
					<div class="page-content">					
						<div class="page-header">
								<?php if(isset($_REQUEST["edit_id"])) { ?>
                                    <h1>
                                        Edit Service
                                        <small>
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                        </small>
                                    </h1>
									<?php } else { ?>								
                                    <h1>
                                        Add Service
                                        <small>
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                        </small>
                                    </h1>
                                    <?php } ?>
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
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;"> Title</label>
										<div class="widget-body">
											<div class="widget-main">
													<div class="col-sm-5">
                                                           <input type="text" name="title" class="form-control" required value="<?php if(isset($_REQUEST["edit_id"])) { echo $fetch_edit_product["title"]; } ?>" />
                                              		</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">Sub Title</label>
										<div class="widget-body">
											<div class="widget-main">
													<div class="col-sm-5">
                                                           <input type="text" name="sub_title" class="form-control" required value="<?php if(isset($_REQUEST["edit_id"])) { echo $fetch_edit_product["sub_title"]; } ?>" />
                                              		</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">Description</label>
										<div class="widget-body">
											<div class="widget-main">
													<div class="col-sm-10">
														<textarea type="text" id="editor" name="description" class="col-md-5 form-control" required style="text-transform:capitalize;" ><?php if(isset($_REQUEST["edit_id"])) { echo $fetch_edit_product["description"]; } ?></textarea>
	                                          		</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1" style="letter-spacing:1px;">
                                        Image </label>
										<div class="widget-body">
											<div class="widget-main">
															<div class="col-sm-5">
																<input type="file" multiple="" name="img[]"  style="border: 1px solid #ccc; padding: 5px; width: 98%;" <?php if(!isset($_REQUEST['edit_id'])){  ?> required <?php } ?> />
															</div>
				
												<?php 
													if(isset($_REQUEST["edit_id"]))
													{ ?>
													<div class="col-md-offset-2 col-md-9 col-sm-8" style="margin-top:7px;">
													<?php
														$gal_image = json_decode($fetch_edit_product['img']);
														foreach ($gal_image as $imgs) { ?>
								                    		<img width="70" src="uploads/services/<?php echo $imgs; ?>" alt="<?php echo $imgs; ?>">
								                    	<?php }	?>
													</div>
													<?php	
													}												
												?>
											</div>
										</div>
									</div>
                                    <div class="col-xs-6">
                                                      
									<div class="form-group">
									<div class="col-md-offset-4 col-md-8" style="padding-left: 4px;">								
										<?php
											if(isset($_REQUEST["edit_id"]))
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="edit_product">
														Edit Service										
												</button>
											<?php
											}
											else
											{
											?>
												<button class="btn btn-info" style="border-radius:5px;" type="submit" name="add_product">
													Add Service										
												</button>
											<?php
											}
										?>
									</div>			
                                    </div>	</div>
                                   
								</form>								
							</div> <!-- col-12 -->

							<div class="col-xs-12">
								<h3 class="header smaller lighter blue">Service Details</h3>

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
                                                <th class="center">Title</th>
                                                <th class="center">Sub Title</th>
												<th class="center">Description</th>
												<th class="center">Image</th>
                                                <th class="center">
													Edit
												</th>
												<th class="center">
													Delete
												</th>
                                                <th></th>
											</tr>
										</thead>
										<tbody id="ajaxData">
										<?php 
											$select_product="select * from service order by service_id DESC";
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
														$gal_image=json_decode($fetch_product['img']);
													?>
													<tr class="center">
														<td>
															<?php echo $c; ?>
														</td>
                                                        <td>
															<?php echo $fetch_product["title"]; ?>	
                                                       	</td>
                                                        <td>
															<?php echo $fetch_product["sub_title"]; ?>	
                                                       	</td>
	                                                    <td>
															<?php echo $fetch_product["description"]; ?>	
                                                       	</td>
                                                       	<td>
                                                       		<?php foreach ($gal_image as $imgs) { ?>
									                    		<a href="uploads/services/<?php echo $imgs; ?>" target="_blank">
									                    			<img width="70" src="uploads/services/<?php echo $imgs; ?>" alt="<?php echo $imgs; ?>">
									                    		</a>
									                    	<?php
									                    		} 
									                    	?>
														</td>
														<td>
															<a href="services.php?edit_id=<?php echo $fetch_product["service_id"]; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
														</td>
														<td>
															<a href="javascript: del_Service(<?php echo $fetch_product["service_id"]; ?>)"><i class="ace-icon fa fa-trash-o bigger-130 red"></i></a>
														</td>
													   
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
