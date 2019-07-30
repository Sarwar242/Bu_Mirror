<!DOCTYPE html>
<?php

	session_start();
 	include("includes/header.php"); 
?>
<?php 
	if (!isset($_SESSION['student_id'])) {
		header("location: index.php");
	}
?>

<html>
<head>
	<?php
	    $sutdent_id=$_SESSION['student_id'];
		$get_group="select * from users where student_id='$student_id'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$name=$row['name'];

	?>
	<title><?php echo "$name";?></title>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" type="text/css" href="style/home_style.css">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<script src="style/jquery.min.js"></script>
		<script src="style/bootstrap.min.js"></script>
</head>
<style>
	#cover-img{
		height:400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 60%;
		left: 40px;
	}
</style>
<body>
	

	<div class="row">
		<div class="col-sm-2">
		</div><br><br>
		<div class="col-sm-6" style="background-color: #e6e6e6; text-align: center;left: 25%; font-size: 16px; border-radius: 5px; position: absolute;">
			Hey <?php echo "$name" ?>, Please Wait  for your Admin's approval!. Thank you.
		</div>
	</div>

</body>
</html>

<div style="position: relative; margin-top: 100px;">
<?php 
include 'templates/footer.php';
?>
</div>
