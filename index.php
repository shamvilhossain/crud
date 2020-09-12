<?php 
include_once('config.php');
$sql="select * from users order by id desc";
$res= mysqli_query($con,$sql);
?>

<html>
	<head><title>Home</title></head>
	<body>
	<a href="add.php">Add New Data</a><br/><br/>
		<div>
		<table width='80%' border=0>
			<tr bgcolor="#CCCCCC">
					<td>Name</td>
					<td>Age</td>
					<td>Email</td>
					<td>Action</td>
			</tr>
			<?php while($row=mysqli_fetch_array($res)) { ?>
				<tr >
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><a href="edit.php?id=<?php echo $row['id'];?>">Edit |</a>
					<a href="delete.php?id=<?php echo $row['id'];?>" onClick="return confirm('Are you sure you want to delete?')">Delete </a></td>
				
				</tr>
			<?php } ?>
			
		</table>
			
		</div>
	</body>

</html>