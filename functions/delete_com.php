<?php
$con=mysqli_connect("localhost","root","","project") or die("Connection Error");

if (isset($_GET['com_id'])) {
	$com_id=$_GET['com_id'];
	$post="select * from comments where com_id='$com_id'";
	$run= mysqli_query($con, $post);
	$row=mysqli_fetch_array($run,MYSQLI_ASSOC);
	$post_id=$row['post_id'];

	$delete_com="delete from comments where com_id='$com_id'";

	$run_delete= mysqli_query($con, $delete_com);
	if($run_delete){
		echo "<script>alert('A comment has been deleted')</script>";
		echo "<script>window.open('../single.php?post_id=$post_id','_self')</script>";
	}
}
?>