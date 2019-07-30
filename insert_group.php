<?php
	include("includes/connection.php");
	if(isset($_POST['sign_up'])){
		$name=mysqli_real_escape_string($con,$_POST['name']);
		
		$dept=mysqli_real_escape_string($con,$_POST['dept']);
		$batch=mysqli_real_escape_string($con,$_POST['batch']);
		$posts="no";
		$ver_code=mt_rand();

		$check_uname="select * from groups where department='$dept'  AND Batch='$batch'";
		$run_uname= mysqli_query($con,$check_uname);

		$check= mysqli_num_rows($run_uname);

		if($check==1){
			$row=mysqli_fetch_array($run_uname);
			$_SESSION['group_id']=$row['group_id'];

			echo "<script>('Group username is already taken by another group!')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}
		$insert="insert into groups(group_name,group_des,department,Batch,	group_created,	group_image,ver_code,admin_id,posts) values('$name','Hello BUians , Welcome to BU mirror.','$dept','$batch','NOW()','default.png','$ver_code','$student_id','$posts')";

		$query=mysqli_query($con,$insert);

		
		if($query){
			$q="select * from groups where group_name='$name'";
			$r=mysqli_query($con,$q);
		$row=mysqli_fetch_array($r);
		$group_id=$row['group_id'];
		$_SESSION['group_id']=$group_id;
		$update="update users set group_id='$group_id' AND approved='1' where student_id='$student_id'";
		$run=mysqli_query($con,$update);

			echo "<script>alert('Congratulations! $name your Batch group created successfully.')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}else{
			echo "<script>alert('Registration failed, try again!')</script>";

		}
	}
?>