<?php 
	include("connect.php");
	$del_id=$_REQUEST["del_id"];
	//echo $del_id;

	$query_select_product="select * from gallery where gallery_id=$del_id";
	$res_select_product=mysqli_query($con,$query_select_product);
	if(!$res_select_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		$num_select_product=mysqli_num_rows($res_select_product);
		if($num_select_product>0)
		{
			$fetch_select_product=mysqli_fetch_assoc($res_select_product);
			unlink("uploads/".$fetch_select_product["gallery"]);
		}
	}
	
	$delete_product="delete from gallery where gallery_id=$del_id";
	$res_product=mysqli_query($con,$delete_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
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
				<tr class="center" >
					<td style="line-height:100px;">
						<?php echo $c; ?>
					</td>
					<td style="line-height:100px;">
						<?php echo $fetch_product["album_name"]; ?>	
					</td>
					<td style="line-height:100px;">
						<img src="uploads/<?php echo $fetch_product["gallery"]; ?>" width="100" height="100">											
					</td>
					<td style="line-height:100px;">
						<a href="gallery.php?edit_id=<?php echo $fetch_product["gallery_id"]; ?>">Edit</a>
					</td>
					<td style="line-height:100px;">
						<a href="javascript: del_gallery(<?php echo $fetch_product["gallery_id"]; ?>)">Delete</a>
					</td>
					<td></td>
					<td></td>
					
				</tr>
				<?php
					$c++;
				}
			}
		}
	}
?>
