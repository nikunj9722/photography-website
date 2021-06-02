<?php 
	include("connect.php");
	error_reporting(0);
	$del_id=$_REQUEST["del_id"];
	//echo $del_id;

	/***********************************************************************************************************/
	$delete_product="delete from contact where id=$del_id";
	$res_product=mysqli_query($con,$delete_product);
	if(!$res_product)
	{
		die("Could Not Execute Query.".mysqli_error($con));
	}
	else
	{
		//echo "Successfully Deleted.";
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
	}
	
?>