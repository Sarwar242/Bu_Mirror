<!DOCTYPE html>
<?php

	session_start();
 	include("includes/header.php");
?>
<?php 
	if (!isset($_SESSION['group_id'])) {
		header("location: index.php");
	}
?>

<html>
<head>
	<?php
	    $group=$_SESSION['group_id'];
		$get_group="select * from groups where group_id='$group'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$group_name=$row['group_name'];
	?>
	<title><?php echo "$group_name";?> group post</title>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" type="text/css" href="style/home_style.css">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<script src="style/jquery.min.js"></script>
		<script src="style/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div>
				
				<?php singlePost(); ?>

		</div>
	</div>

</body>
</html>
<br>
<div style="margin-top: auto;">
<?php 
include 'templates/footer.php';
?></div>