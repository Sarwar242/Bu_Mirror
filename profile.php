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
	$student_id=$_SESSION['student_id'];
		$ap="select * from users where student_id='$student_id'";
		$run=mysqli_query($con,$ap);
		$res=mysqli_fetch_array($run);
		$approved=$res['approved'];
		if ($approved==0) {
			header("location: wait.php");
		}
	    $group=$_SESSION['group_id'];
		$get_group="select * from groups where group_id='$group'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$group_name=$row['group_name'];
	?>
	<title><?php echo "$group_name";?></title>
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
		</div>
		<div class="col-sm-8">
			<?php 
				echo "
					<div>
						<img id='cover-img' class='img-rounded' src='groups/$group_image' alt='cover'>
					</div>

					<form action='profile.php?u_id=$group_id' method='post' enctype='multipart/form-data'>

					<ul class='nav pull-left' style='position:absolute; top:10px;left:40px;'>
						<li class='dropdown'>
							<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Picture</button>
							<div class='dropdown-menu'>
								<center>
									<p>Click <strong>Select Image</strong> and then click the <br> <strong>Update Image</strong></p>
									<label class='btn btn-info'>Select Image
									<input type='file' name='g_image' size='60' /></label><br><br>
									<button name='submit' class='btn btn-info'>Update Image</button>

								</center>
							</div>
						</li>
					</ul>

					</form>
				<div id='profile-img'>
					<img src='groups/$group_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				</div>
					";
			 ?>
			 <?php
			if(isset($_POST['submit'])){
			
			$group_image=$_FILES['g_image']['name'];
			$image_tmp=$_FILES['g_image']['tmp_name'];
			if($image_tmp==false){
				echo "<script>alert('Please Select a valid Image first!')</script>";
			header('location:profile.php');
		}else{
			move_uploaded_file($image_tmp,"groups/$group_image");
			$update="update groups set group_image='$group_image' where group_id='$group_id'";

			$run=mysqli_query($con,$update);

			if($run){
			echo "<script>alert('Your Profile Pic Updated!')</script>";
			echo "<script>window.open('profile.php','_self')</script>";}
		}
		} ?>
		</div>
		<div class="col-sm-2"></div>
	</div>

	<div class="row">
		<div class="col-sm-2">
		</div><br><br>
		<div class="col-sm-6" style="background-color: #e6e6e6; text-align: center;left: 25%; font-size: 16px; border-radius: 5px; position: absolute;">
			<?php 
				echo "
				<br>
				<center><h2><strong>Group Profile</strong></center>
				<center><h1>$group_name</h1></center><br>
				<p><strong><i style='color:grey;'>$group_des</i></strong></p><br>
				<p><strong>Department: </strong> $group_dept.</p><br>
				<p><strong>Batch: </strong> $group_batch.</p><br>
				<p><strong>Group Created on: </strong> $reg_date.</p><br>"
			 ?>
		</div>
	</div>

</body>
</html>

<?php 
include 'templates/footer.php';
?>
