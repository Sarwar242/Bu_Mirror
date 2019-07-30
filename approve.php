<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Error");

if (isset($_GET['student_id'])) {
	$student_id=$_GET['student_id'];
	$yes=1;
	
	$ac_req="update users set approved='$yes' where student_id='$student_id'";

	$run= mysqli_query($con, $ac_req);
	if($run){
		echo "<script>alert('An user join request  has been accepted!')</script>";
		echo "<script>window.open('approval_request.php','_self')</script>";
	}
}
?>