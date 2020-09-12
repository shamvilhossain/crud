<?php
include("config.php");
$id=$_GET['id'];
$sql_1="delete from users_crud where id='$id'";
$res_1= mysqli_query($con,$sql_1);
header('Location: index.php');

?>