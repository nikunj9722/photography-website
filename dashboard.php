<?php	
	$title='Dashboard'; 
	include'header.php';
?>
    <br><h1 class="text-center text-info head">Silder </h1><br>
	<div class="container">
		<a href="slideradd.php" class="btn btn-info">Add image</a>
		<div class="">	<br/>
			<table class="table table-bordered text-center">
				<tr>
					<th>NO</th>
					<th>Caption</th>
					<th>Image</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php $slider = mysqli_query($con,"select * from slider");
						$no = 1; 
						while($row = mysqli_fetch_assoc($slider)){
						?>	
						<tr>
							<th><?php echo $no++; ?></th>
							<th><?php echo $row['caption'] ?></th>
							<th><img src="image/<?php echo $row['img'] ?>" width="250"></th>
							<th><a href="slideredit.php?eid=<?php echo $row['id']?>" >Edit</a></th>
							<th><a href="sliderdel.php?did=<?php echo $row['id']?>" onclick="return confirm('Are sure !');">delete</a></th>
						</tr>
						<?php	
						}
				?>
			</table>
		</div>
	</div>
<?php include'footer.php'; ?>

   