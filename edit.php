<?php 
include_once('config.php');
if(isset($_POST['update'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$age=mysqli_real_escape_string($con,$_POST['age']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$id=mysqli_real_escape_string($con,$_POST['id']);
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
		$sql="update users_crud set name='$username',  age='$age',  email='$email' where id='$id'  ";
		$res= mysqli_query($con,$sql);
		echo "<font color='green'>Data Updated successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
$id=$_GET['id'];
$sql_1="select * from users_crud where id='$id'";
$res_1= mysqli_query($con,$sql_1);
while($res_2 = mysqli_fetch_array($res_1))
{
	$name = $res_2['name'];
	$age = $res_2['age'];
	$email = $res_2['email'];
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
				<td><input type="text"  name="username" value="<?php echo $name;?>" required></td>	
			</tr>
			<tr >
				<td>Age:</td>
				<td><input type="number"  name="age" value="<?php echo $age;?>" required></td>	
			</tr>
			<tr >
				<td>Email:</td>
				<td><input type="email"  name="email" value="<?php echo $email;?>" required></td>	
			</tr>
			<tr >
				<td></td>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit"  name="update" value="Save"></td>	
			</tr>
				
			
		</table>
			
		</form>
	</body>

</html>