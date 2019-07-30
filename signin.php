<!DOCTYPE html>
<html>
	<head>
		<title>Signin</title>
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
		#signin{
			width: 60%;
			border-radius: 30px;
		}
		.overlap-text{
			position: relative;
		}
		.overlap-text a{
			position: absolute;
			top: 8px;
			right: 10px;
			font-size: 14px;
			text-decoration: none;
			font-family: 'Overpass Mono', monospace;
			letter-spacing: -1px;

		}

	</style>
	<body>
		<div class ="row">
			<div class="col-sm-12">
				<div class="well">
					<center>
						<h1 style="color: white;">Bu Mirror</h1>
					</center>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="main-content">
					<div class="header">
						<h3 style="text-align: center;"><strong>Login to Your Group</strong></h3><br>

					</div>
					<div class="l-part">
						<form action="" method="post">
							
						
							<br><input class="form-control input-md" type="text" name="student_id" required="required" placeholder="Student ID"><br>
						
							<div class="overlap-text">
						
								<input class="form-control input-md" type="password"  name="password" required="required" placeholder="Password">
								<a style="text-decoration: none; float: right; color: #187FAB;" data-toggle="tootip" href="forgot_password.php" title="Reset Password">Forgot?</a>
							
							</div><br>
							
							<a style="text-decoration: none; float: right; color: #187FAB;" data-toggle="tootip" href="signup.php" title="Signup">Don't Have an account?</a><br><br>
							<center><button id="signin" class="btn btn-info btn-lg" name="login">Login</button></center>
							<?php
					include("login.php");  ?>
						</form>
					</div>
				</div>
			</div>

			
		</div>
	</body>
	<footer>
		<div style="margin-top: 20px" class ="row">
			<div class="col-sm-12">
				<div class="well">
					<center>
						<h1 style="color: white;">Developed By BU Thunders Group&reg</h1>
					</center>
				</div>	
			</div>
		</div>
	</footer>
</html>