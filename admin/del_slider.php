<?php 
	include("connect.php");
	error_reporting(0);
	$del_id=$_REQUEST["del_id"];
		
	usleep(500000);
	$target_dir='uploads/slider/';
	$get_slider_pro = "select * from slider where id = '$del_id'";
	$res_edit_product=mysqli_query($con,$get_slider_pro);
	if(!$res_edit_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		$fetch_edit_product=mysqli_fetch_assoc($res_edit_product);		
		$pimg = json_decode($fetch_edit_product['img']);
		foreach ($pimg as $single_img) {
			unlink($target_dir.$single_img);
		}

	}
	
	$delete_product="delete from slider where id=$del_id";
	$res_product=mysqli_query($con,$delete_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		//echo "Successfully Deleted.";
		$select_product="select * from slider order by id DESC";
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
                        <?php echo $fetch_product["title"]; ?>	
                    </td>
                    <td>
                        <?php echo $fetch_product["desc"]; ?>	
                    </td>
                    <td>
						<img src="uploads/slider/<?php echo $fetch_product["img"]; ?>" width="100" height="70">			
					</td>
                    <td>
                        <a href="slider.php?edit_id=<?php echo $fetch_product["id"]; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="javascript: del_slider(<?php echo $fetch_product["id"]; ?>)">Delete</a>
                    </td>
                    
                </tr>
				<?php
					$c++;
				}
			}
		}										
	}
	
?>