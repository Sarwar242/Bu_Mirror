<?php
	$get_id=$_GET['post_id'] ;

	$get_com="select * from comments where post_id = '$get_id' ORDER by 1 DESC";
	$run_com= mysqli_query($con,$get_com);

	while ($row=mysqli_fetch_array($run_com,MYSQLI_ASSOC)) {
		$com=$row['comment'];
		$com_id=$row['com_id'];
		$id=$row['student_id'];
		$com_name=$row['com_author'];
		$date=$row['date'];

		$get_group="select * from users where student_id='$id'";
		$run_group=mysqli_query($con,$get_group);
		$row= mysqli_fetch_array($run_group);
		$name=$row['name'];

		echo "
			<br>
			<div id='comments'>
			<h3>$name</h3><span><i>Commented</i> on $date</span>
			<p>$com</p>
			";

			if($_SESSION['student_id']==$id){
				echo "<a href='editCom.php?com_id=$com_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_com.php?com_id=$com_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i>&nbspDelete</button></a>
	</div><br>";
			}
			include("delete_com.php");
	}
 ?>