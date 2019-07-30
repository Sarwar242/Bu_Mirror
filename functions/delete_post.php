<?php
$con=mysqli_connect("localhost","root","","bu_mirror") or die("Connection Error");

if (isset($_GET['post_id'])) {
	$post_id=$_GET['post_id'];
	$delete_post="delete from posts where post_id='$post_id'";

	$run_delete= mysqli_query($con, $delete_post);
	$delete_com="delete from comments where post_id='$post_id'";
	$run= mysqli_query($con, $delete_com);
	if($run_delete){
		echo "<script>alert('A post has been deleted')</script>";
		echo "<script>window.open('../our_post.php','_self')</script>";
	}
}
?>