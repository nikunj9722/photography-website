<?php 
	include("connect.php");
	error_reporting(0);
	$del_id=$_REQUEST["del_id"];
	//echo $del_id;

	$select_product="select * from addalbum where album_id=$del_id";
	$res_product=mysqli_query($con,$select_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		$fetch_product1=mysqli_fetch_assoc($res_product);
		$directory = "uploads/$fetch_product1[album_name]";
		$images = glob($directory."/*");
		foreach($images as $img)
		{
		  unlink($img);
		}
	rmdir("uploads/$fetch_product1[album_name]");
	}
	
	
	/***********************************************************************************************************/
	$delete_product="delete from addalbum where addalbum.album_id=$del_id";
	$res_product=mysqli_query($con,$delete_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		//echo "Successfully Deleted.";
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
                        <a href="addalbum.php?edit_id=<?php echo $fetch_product["album_id"]; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="javascript: del_album(<?php echo $fetch_product["album_id"]; ?>)">Delete</a>
                    </td>
                    
                </tr>
				<?php
					$c++;
				}
			}
		}										
	}
	
?>