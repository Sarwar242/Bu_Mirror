<?php
	session_start();
	include("includes/connection.php");

	if(isset($_POST['login'])){
		$student_id=mysqli_real_escape_string($con,$_POST['student_id']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);

		$select_group= "select * from users where student_id='$student_id' AND password='$pass'";
		$query=mysqli_query($con,$select_group);
		$row= mysqli_fetch_array($query);
		$check_group=mysqli_num_rows($query);
		$group_id=$row['group_id'];
		
		if($group_id==0&&$check_group==1){
			$_SESSION['student_id']=$student_id;
			header("location: create_group.php");
		}
		else if($check_group==1){
			$_SESSION['student_id']=$student_id;
			$_SESSION['group_id']=$group_id;

			echo "<script>window.open('home.php','_self')</script>";
		}else{
			echo "<script>alert('Incorrect details, try again!')</script>";
		}
	}
?>