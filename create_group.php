<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection was not established");
	session_start();
	$student_id=$_SESSION['student_id'];

	$user= "select * from users where student_id='$student_id'";
		$query=mysqli_query($con,$user);
		$row= mysqli_fetch_array($query);
		
		$name=$row['name'];
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Create Group</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<script src="style/jquery.min.js"></script>
		<script src="style/bootstrap.min.js"></script>
	</head>
	<style>
		body{
			overflow-x: hidden;
		}
		.main-content{
			width: 50%;
			height: 40%;
			margin: 10px auto;
			background-color: #fff;
			border:2px solid #e6e6e6;
			padding: 40px 50px
		}
		.header{
			border:8px solid #000;
			margin-bottom: 5px;
		}
		.well{
			background-color: #187FAB;
		}
		#signup{
			width: 60%;
			border-radius: 30px;
		}
	</style>
	<body>
		<div class ="row">
			<div class="col-sm-12">
				<div class="well">
					<center>
						<h1><a style="text-decoration:none;color: white;" href="index.php"> Bu Mirror</a></h1>
					</center>
				</div>	
			</div>
		</div>

				<div class="row">
			<div class="col-sm-12">
				<div class="main-content">
					<div class="header">
						<h3 style="text-align: center;">Hey, <strong><?php echo $name; ?>! </strong> <br> [You will be an admin of the group.]</h3><br>

					</div>
					<div class="content">
						<h3 style="text-align: center;"><strong>Create Your Group</strong></h3><br>

					</div>
					<div class="l-part">
						<form action="" method="post">
							
							<div class="input-group-addon"><i class="fas fa-pencil-alt"></i>
								<span>
									<input class="form-control" type="text" name="name" required="required" placeholder="Group Name">
								</span>
							</div>
							
							<br>
							<div class="input-group-addon"><i class="far fa-building"></i>
								<span>
									<select name="dept">
									<option disabled>Select your Department</option>
									<option>CSE</option>
									<option>CHEM</option>
									<option>PHY</option>
									<option>ENG</option>
									<option>BANGLA</option>
									<option>LAW</option>
									<option>Marketing</option>
									<option>Management</option>
									<option>Bio Chemistry</option>
								</select>
							</span>
								
							</div><br>
							<div class="input-group-addon input-md"><i class="fas fa-layer-group"></i>
								<span>
									<select name="batch">
										<option disabled>Select Your Batch</option>
									<option>First</option>
									<option>Second</option>
									<option>Third</option>
									<option>Fourth</option>
									<option>Fifth</option>
									<option>Sixth</option>
									<option>Seventh</option>
									<option>Eighth</option>
									<option>NINTH</option>
									<option>TENTH</option>
								</select>
							</span>
								
							</div><br>
							<center><button id="Signup" class="btn btn-info btn-lg" name="sign_up">Create</button></center>
							<?php
					include("insert_group.php");  ?>
						</form>
					</div>
				</div>
			</div>

			
		</div>

	<div style="margin-top: 20px;">
		<?php 
include 'templates/footer.php';

?></div>
</body>
</html>
	