<!DOCTYPE html>
<?php

	session_start();
 	include("includes/header.php");
?>
<?php 
	if (!isset($_SESSION['group_id'])) {
		header("location: index.php");
	}
	else{
?>

<html>
<head>
	<?php
	$student_id=$_SESSION['student_id'];
		$ap="select * from users where student_id='$student_id'";
		$run=mysqli_query($con,$ap);
		$res=mysqli_fetch_array($run);
		$approved=$res['approved'];
		if ($approved==0) {
			header("location: wait.php");
		}
	    $group_id=$_SESSION['group_id'];
		$get_group="select * from groups where group_id='$group_id'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$group_name=$row['group_name'];
	?>
	<title>Posts of <?php echo $group_name;  ?></title>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" type="text/css" href="style/home_style.css">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<script src="style/jquery.min.js"></script>
		<script src="style/bootstrap.min.js"></script>
</head>
<body>
	<div >
		<div>
			<center><h2>Group Posts</h2></center>
				<?php group_post(); ?>
		</div>
	</div>

</body>
</html>
<?php } ?>
<?php 
include 'templates/footer.php';
?>