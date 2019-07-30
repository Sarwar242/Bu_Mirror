<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Error");

if (isset($_GET['student_id'])) {
	$student_id=$_GET['student_id'];

	$delete_req="delete from users where student_id='$student_id'";

	$run_delete= mysqli_query($con, $delete_req);
	if($run_delete){
		echo "<script>alert('An user join request  has been deleted')</script>";
		echo "<script>window.open('approval_request.php','_self')</script>";
	}
}
?>