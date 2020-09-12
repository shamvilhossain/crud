<?php 
include_once('config.php');
if(isset($_POST['username'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$age=mysqli_real_escape_string($con,$_POST['age']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	if(empty($username) || empty($age) || empty($email)) {
				
		if(empty($username)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		$sql="insert into users (name,age,email) values('$username','$age','$email')";
		$res= mysqli_query($con,$sql);
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}

?>


<html>
	<head><title>Home</title></head>
	<body>
	<a href="add.php">Add New Data</a><br/><br/>
		<form name='addform' action ="" method='post'>
		<table width='80%' border=0>

			<tr >
				<td>Name:</td>
				<td><input type="text"  name="username" required></td>	
			</tr>
			<tr >
				<td>Age:</td>
				<td><input type="number"  name="age" required></td>	
			</tr>
			<tr >
				<td>Email:</td>
				<td><input type="email"  name="email" required></td>	
			</tr>
			<tr >
				<td></td>
				<td><input type="submit"  name="save" value="Save"></td>	
			</tr>
				
			
		</table>
			
		</form>
	</body>

</html>