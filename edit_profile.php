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

<html>
<head>
	<title>Edit <?php echo $group_name; ?> profile</title>
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
				<form method="post" id="f" class="ff" enctype="multipart/form-data">
					<table>
						<tr align="center">
							<td colspan="6"><h2>Edit Group Profile</h2></td>
						</tr>
						<tr>
							<td align="right">Name: </td>
							<td>
								<input type="text"  name="name" required="required" value="<?php echo $name; ?>">
							</td>
						</tr>

						
							<td align="right">Group Username: </td>
							<td>
								<input type="text"  name="u_name" required="required" value="<?php echo $group_name; ?>">
							</td>
						</tr>
						<tr>
							<td align="right">Description: </td>
							<td>
								<input type="text"  name="des" required="required" value="<?php echo $group_des; ?>">
							</td>
						</tr>
						<tr>
						<tr>
							<td align="right">Password: </td>
							<td>
								<input type="password"  name="pass" required="required" id="mypass" value="<?php echo $group_pass; ?>">
								<br>
								<input type="checkbox" onclick="show_password()">Show Password
							</td>
						</tr>
						<tr>
							<td align="right">Department:</td>
							<td>
								<select name="dept" disabled="disabled">
									<option><?php echo $group_dept ?></option>
									<option>CSE</option>
									<option>CHEM</option>
									<option>PHY</option>
									<option>ENG</option>
									<option>BANG</option>
									<option>LAW</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Batch:</td>
							<td>
								<select name="batch" disabled="disabled">
									<option>First</option>
									<option>Second</option>
									<option>Third</option>
									<option>Fourth</option>
									<option>Fifth</option>
									<option>Sixth</option>
									<option>Seventh</option>
									<option>Eighth</option>
								</select>
							</td>
						</tr>
						<tr align="center">
							<td colspan="6">
								<input style="width: 100px" type="submit" name="update" value="Update">
							</td>
						</tr>
					</table>

				</form>
<?php
	if(isset($_POST['update'])){

					$name=$_POST['name'];
					$group_name=$_POST['u_name'];
					$group_des=$_POST['des'];
					$group_pass=$_POST['pass'];
					$group_dept=$_POST['dept'];
					$group_batch=$_POST['batch'];

	$update="update groups set group_name ='$name', group_username='$group_name', group_des='$group_des', group_pass='$group_pass' , department='$group_dept', Batch='$group_batch' WHERE group_id='$group_id'";
	$run= mysqli_query($con,$update);
	if($run){
	echo "<script> alert('Account has been updated successfully')</script>";
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

<script>
	function show_password(){
		var x= document.getElementById("mypass");
		if (x.type=="password") {
			x.type="text";
		}else{
			x.type="password";
		}

	}
</script>

<?php 
include 'templates/footer.php';
?>