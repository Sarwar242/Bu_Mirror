<?php

include("includes/connection.php");
$id = $_GET['id'];
$query = "DELETE FROM groups WHERE group_id = '$id'";
$data = mysqli_query($con, $query);

if($data)
{
	echo "<script>alert('Record deleted successfully!!!')</script>";
	header("location:admin.php");
}
else
{
	echo "<font color = 'red'>Sorry, Delete operation isn't perform";
	header("location:admin.php");
}
?>