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
                                    <a href="#">
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
								Contact Details
							</li>
   						</ul><!-- /.breadcrumb -->
					</div>
					
					<div class="page-content">					
						
						<div class="row">
							<div class="col-xs-12">
								<h3 class="header smaller lighter blue">Contact Details</h3>
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
													Contact Person
												</th>
												<th class="center">
													Email
												</th>
												<th class="center">
													Subject
												</th>
												<th class="center">
													Message
												</th>
												<th class="center">
													Delete
												</th>
											</tr>
										</thead>
										<tbody id="ajaxData">
                                        <?php 
                                        ?>
										<?php 
											$select_product="select * from contact order by id DESC";
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
															<?php echo $fetch_product["name"]; ?>	
                                                       	</td>
														<td>
															<?php echo $fetch_product["email"]; ?>	
														</td>
														<td>
															<?php echo $fetch_product["subject"]; ?>	
														</td>
														<td>
															<?php echo $fetch_product["message"]; ?>	
														</td>
														<td>
   															<a href="javascript: del_contact(<?php echo $fetch_product["id"]; ?>)"><i class="ace-icon fa fa-trash-o bigger-130 red"></i></a>
														</td>
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
