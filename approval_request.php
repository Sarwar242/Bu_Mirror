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
		$group_id=$_SESSION['group_id'];
	    $sutdent_id=$_SESSION['student_id'];
		$get_group="select * from users where group_id='$group_id' AND approved='0'";
		$run_group=mysqli_query($con,$get_group);

		$num=mysqli_num_rows($run_group);
		
		

	?>
	<title>Admin</title>
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
		<div class="col-sm-8" style="background-color: #e6e6e6; text-align: center;left: 25%; font-size: 16px; border-radius: 5px; position: absolute;">
			<?php
			while($row=mysqli_fetch_array($run_group,MYSQLI_ASSOC)){
				$name=$row['name'];
				$id=$row['student_id'];
				$image=$row['image'];
			echo "

				<div class='col-sm-12'>
				
				
		<p><img src='images/$image' class='img-circle'  width='100px' height='100px' style='float: left; margin-left: 2px; padding: 2px; border: 2px;' /></p>
				<div class='col-sm-8'>
					<h3><p>$name</p><pre>$id</pre></h3> 
			
			<a href='approve.php?student_id=$id'>
	<button class='btn btn-info fas fa-check-circle'>&nbspApprove</button></a>
	
	<a href='delete_req.php?student_id=$id'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i></i>&nbspDelete</button></a>
	</div></div>

	<br><br><br>
	<div class='col-sm-4'><br></div>
<br>
	";
}

if($num==0){
	echo "<div class='row'>
		<div style='background-color: #e6e6e6; text-align: center; left: 20%; font-size: 16px; border-radius: 5px; position: absolute;'>
			<strong> Hey Admin, no approval requests remaining.</strong>
		</div>
	</div>";
}
			 ?>
			
		</div>
	</div>

</body>
</html>

<div style="position: relative; margin-top: 500px;">
<?php 
include 'templates/footer.php';
?>
</div>
