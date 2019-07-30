<!DOCTYPE html>
<html>
	<head>
		<title>Welcome BuMirror Login And Signup</title>
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
			background-color: #bdc3c7;
		}
		#centered1{
			position: absolute;
			font-size: 10vw;
			top: 30%;
			left: 40%;
			transform: translate(-46%,-50%);
		}
		#centered2{
			position: absolute;
			font-size: 10vw;
			top: 50%;
			left: 40%;
			transform: translate(-50%,-50%);
		}
		#centered3{
			position: absolute;
			font-size: 10vw;
			top: 70%;
			left: 40%;
			transform: translate(-44%,-50%);
		}
		#signup{
			width: 60%;
			border-radius:30px;
		}
		#login{
			width: 60%;
			background-color: #fff;
			border:1px solid #1da1f2;
			color: #1da1f2;
			border-radius:30px;
		}
		#login:hover{
			width: 60%;
			background-color: #fff;
			border:1px solid #1da1f2;
			color: #1da1f2;
			border-radius:30px;
		}
		.well{
			background-color: #16a085;
		}
		.visit li{
			font-family: 'Pacifico', cursive;
			margin-left: 20px;
			font-weight: bold;
			font-size: 20px;
		}
		.visit a{
			text-decoration: none;
			color: green;
		}
	</style>

	<body>
		<div class ="row">
			<div class="col-sm-12">
				<div class="well">
					<center>
						<h1 style="color: white; font-family: 'Pacifico', cursive; ">Bu Mirror</h1>
					</center>
				</div>	
			</div>
		</div>


		<div class="row">
			<div class="col-sm-6" style="left: 0.8%;">
				<img src="images/bu22.jpg" class="img-rounded" title="BuMirror" width="650px" height="565px">
				<div id="centered1" class="centered">
					<h3 style="color: orange;"><span class="fas fa-search">&nbsp&nbspThank You for visiting us.</span></h3>
				</div>
				<div id="centered2" class="centered">
					<h3 style="color: orange;"><span class="fas fa-search">&nbsp&nbspThis is only for BUians.</span></h3>
				</div>
				<div id="centered3" class="centered">
					<h3 style="color: orange;"><span class="fas fa-search">&nbsp&nbspCreate your Batch Group.</span></h3>
				</div>
			</div>

				<div class="col-sm-6" style="left: 8%;">
					<img src="images/logo.png" class="img-rounded" title="BuMirror" style="margin-left: 100px;" width="80px" height="80px">
					<h2><strong>Always stay in the University<br>of<br> Barishal !!!</strong></h2><br><br>
					<h4><strong>Join BU Mirror Today....</strong></h4>
					<form method="post" action="">

					<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
					<?php
						if (isset($_POST['signup'])) {
							echo "<script>window.open('signup.php','_self')</script>";
						}
					?>

					<button id="login" class="btn btn-info btn-lg" name="login">Login</button>	<br><br>	
					<?php
						if (isset($_POST['login'])) {
							echo "<script>window.open('signin.php','_self')</script>";
						}
					?>				
					</form>
					<div class="visit">
						<li><a href="home.html">Visit BU</a></li>
					</div>
			</div>
		</div>
	</body>

	<footer>
		<div style="margin-top: 20px;" class ="row">
				<div class="well">
					<center>
						<h1 style="color: white;">Developed By BU Thunders Group&reg</h1>
					</center>
				</div>
		</div>
	</footer>
</html>