<!DOCTYPE html>
<?php

	session_start();
 	include("includes/header.php");

?>
<?php 
	if (!isset($_SESSION['student_id'])) {
		header("location: index.php");
	}
	else{
?>

<html>
<head>
	<title>Edit Post</title>
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
				<?php
					if(isset($_GET['post_id'])){
					$get_id=$_GET['post_id'];

					$get_post="select * from posts where post_id='$get_id'";
					$run_post=mysqli_query($con,$get_post);
					$row=mysqli_fetch_array($run_post);

					$post_con=$row['post_content'];

				}
				 ?>
				 <form action="" method="post" id="f">
				 	<center>
				 		<h2>Edit Your Post:</h2>
				 	</center>
				 	<textarea cols="83" rows="4" name="content"><?php echo $post_con; ?></textarea>
				 	<input type="submit" name="update" value="Update Post">
				 </form>
				 <?php
				 	if(isset($_POST['update'])){
				 	$content=$_POST['content'];

				 	$update_post="update posts set post_content='$content' where post_id='$get_id'";
				 	$run_update=mysqli_query($con,$update_post);

				 	if($run_update){
				 	echo "<script>alert('Post has been updated successfully')</script>";
				 	echo "<script>window.open('home.php','_self')</script>";
				 }
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