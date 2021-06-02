<?php 
	include("connect.php");
	$del_id=$_REQUEST["del_id"];
		
	usleep(500000);
	$target_dir='uploads/services/';
	$get_service_pro = "select * from service where service_id = '$del_id'";
	$res_edit_product=mysqli_query($con,$get_service_pro);
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
	
	$delete_product="delete from service where service_id=$del_id";
	$res_product=mysqli_query($con,$delete_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		//echo "Successfully Deleted.";
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
						<img src="uploads/services/<?php echo $fetch_product["img"]; ?>" width="100" height="70">											
					</td>
                    <td>
                        <a href="services.php?edit_id=<?php echo $fetch_product["service_id"]; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="javascript: del_services(<?php echo $fetch_product["service_id"]; ?>)">Delete</a>
                    </td>
                    
                </tr>
				<?php
					$c++;
				}
			}
		}										
	}
	
?>