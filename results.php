<!DOCTYPE html>
<?php

	session_start();
 	include("includes/connection.php");
 	include("functions/function.php");
?>
<?php 
	if (!isset($_SESSION['u_name'])) {
		header("location: index.php");
	}
	else{
?>

<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style/home_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div id="head_wrap">
			<div id="header">
				<ul id="menu">
					<li><a class="fas fa-home" href="home.php">&nbspHome</a></li>
					<li><a class="fa fa-user" href="profile.php">&nbspProfile</a></li>
					<li><a class="fas fa-certificate" href="description.php">&nbspDescription</a></li>
					<li><a class="fa fa-file" href="files.php">&nbspFiles</a></li>
					<li><a  class="fas fa-grin-stars" href="about.php">&nbspAbout</a></li>
					
				</ul>

				<form method="post" action="results.php" id="form1">
					<input type="text" name="info_query" placeholder="Search">
					<input type="submit" name="search" value="Search">
					
				</form>
				
			</div>
			
		</div>
		<div class="content">
			<div id="group_timeline">
				<div id="user_details">
					<?php
					global $group_id;
					$user=$_SESSION['u_name'];
					$get_group="select * from groups where group_username='$user'";
					$run_group=mysqli_query($con,$get_group);
					$row= mysqli_fetch_array($run_group);

					$group_id=$row['group_id'];
					$group_name=$row['group_username'];
					$group_des=$row['group_des'];
					$group_image=$row['group_image'];

					$group_posts= "select * from posts where group_id= '$group_id'";
					$run_post= mysqli_query($con, $group_posts);
					$posts= mysqli_num_rows($run_post);
					
					echo "
						<center>
		<img src='groups/$group_image' width='200' height='200'/>
	</center>
	<div id='group_mention'>
		<p><center><h2>$group_name</h2></center>
			<center><strong>$group_des</strong></center>
		</p>
		<p><a class='fab fa-accusoft'  href='our_post.php?u_id=$group_id'>&nbspGroup Posts($posts)</a>
		</p>
		<p><a class='far fa-edit' href='edit_profile.php?u_id=$group_id'>&nbspEdit Group Account</a>
		</p>
		<p><a class='fas fa-sign-out-alt' href='logout.php'>&nbspLogout</a>
		</p>
	</div>";
					?>
				</div>
			</div>
			<div id="content_timeline">
				
				
				<center><h2>See Your Results</h2></center>
				<?php search($group_id); ?>
			</div>
		</div>
	</div>

</body>
</html>
<?php } ?>

<?php 
include 'templates/footer.php';
?>