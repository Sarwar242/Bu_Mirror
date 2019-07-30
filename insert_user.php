<?php
	include("includes/connection.php");

	if(isset($_POST['sign_up'])){
		$student_id=mysqli_real_escape_string($con,$_POST['student_id']);
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$pass=mysqli_real_escape_string($con,$_POST['u_pass']);
		$dept=mysqli_real_escape_string($con,$_POST['dept']);
		$batch=mysqli_real_escape_string($con,$_POST['batch']);

		if(strlen($pass)<6){
			echo "<div class='alert alert-danger'><strong>Error ! </strong>Password should be minimum 6 Characters!</div>";
			return;
		}

		$check_uname="select * from users where student_id='$student_id'";
		$run_uname= mysqli_query($con,$check_uname);

		$check= mysqli_num_rows($run_uname);
		$q="select * from groups where department='$dept' AND Batch='$batch'";
		$r=mysqli_query($con,$q);
		$num=mysqli_num_rows($r);
		if($num){
		$res=mysqli_fetch_array($r);
		$group_id=$res['group_id'];}

		if($check==1){
			echo "<script>('This Student ID  is already Registered!')</script>";
			echo "<script>window.open('signup.php','_self')</script>";
		}
		$insert="insert into users(student_id, name ,email, department,batch,image,group_id,password,approved) values('$student_id','$name','$email' ,'$dept','$batch','default.png','$group_id','$pass','0')";

		$query=mysqli_query($con,$insert);

		if($query){
			echo "<script>alert('Congratulations! $name your profile created successfully.')</script>";
			echo "<script>window.open('signin.php','_self')</script>";
		}else{
			echo "<script>alert('Registration failed, try again!')</script>";

		}
	}
?>