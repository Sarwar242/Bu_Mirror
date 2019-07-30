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
		 $group_id=$_SESSION['group_id'];

		$get_group="select * from groups where group_id='$group_id'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$group_name=$row['group_name'];
?>

<html>
<head>
	<title><?php echo "$group_name";?></title>
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
		
		<div class="content">
			
			<div id="content_timeline">
				<h2>Edit your Comment</h2>
				<?php
					if(isset($_GET['com_id'])){
					$get_id=$_GET['com_id'];

					$get_post="select * from comments where com_id='$get_id'";
					$run_post=mysqli_query($con,$get_post);
					$row=mysqli_fetch_array($run_post);

					$post_com=$row['comment'];
					$post_auth=$row['com_author'];
					$post_id=$row['post_id'];

				}
				echo "
			<br>
 			<form method='post' id ='reply'>
 				<input type='text' name='name' placeholder='Name..' value='$post_auth'><br>
 				<textarea cols='45' rows='5' name='comment' placeholder='Comment....'>$post_com</textarea><br>
 				<input type='submit' name='reply' value='Update'>
 			</form>
				";

			if (isset($_POST['reply'])) {
				$author=$_POST['name'];
				$comment=$_POST['comment'];

				if($author==''){
					$author="UnNamed";
				}
				$insert="update comments set com_author='$author',comment='$comment' where com_id='$get_id'";
				$run=mysqli_query($con,$insert);
				echo "<script>alert('Your comment has been edited')</script>";

				echo "<script>window.open('single.php?post_id=$post_id','_self')</script>";
			}
				 ?>
			</div>
		</div>
	</div>

</body>
</html>
<?php } ?>
<?php 
include 'templates/footer.php';
?>