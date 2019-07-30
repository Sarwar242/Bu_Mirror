<?php
	$con=mysqli_connect("localhost","root","","project") or die("Connection was not established");

	function insertPost(){
		if(isset($_POST['sub'])){
			global $con;
			global $group_id;
			$student_id=$_SESSION['student_id'];
			$content=htmlentities($_POST['content']);
			$upload_image=$_FILES['upload_image']['name'];
			$image_tmp=$_FILES['upload_image']['tmp_name'];

			if(strlen($content)==0 && $image_tmp==false){
				echo "<script>alert('Please enter something!.')  </script>";
				echo "<script>open.window('home.php','_self')</script>";
			}else{
				move_uploaded_file($image_tmp,"images/$upload_image");
				$insert="insert into posts(group_id,student_id,file,post_content,	post_date) values('$group_id','$student_id','$upload_image','$content',NOW())";

				$run= mysqli_query($con,$insert);

				if($run){
					echo "<script>alert('Your Post Have Been Updated Successfully.')  </script>";
					$update="update groups set posts='yes' where group_id='$group_id'";
					$run_update=  mysqli_query($con,$update);
				
				}
			}
		}
	}

	function getPosts(){
		global $con;
		$group_id=$_SESSION['group_id'];
		$per_page=4;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}else{
			$page=1;
		}
		$start_from=($page-1)*$per_page;
		$get_posts="select * from posts where group_id='$group_id' ORDER by 1 DESC limit $start_from, $per_page";

		$result = mysqli_query($con,$get_posts) or die (mysqli_error($con));

		while ( $row_posts= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			
			$post_id=$row_posts['post_id'];
			$group_id=$row_posts['group_id'];
			$student_id=$row_posts['student_id'];
			$content=substr($row_posts['post_content'],0, 50);
			$upload_image=$row_posts['file'];
			$post_date=$row_posts['post_date'];


			$group="select * from groups where group_id='$group_id' AND posts='yes' ";

			$run_group=mysqli_query($con,$group);
			$new_group=mysqli_fetch_array($run_group);

			$group_name= $new_group['group_name'];
			$group_image= $new_group['group_image'];

			$user="select* from users where student_id='$student_id'";
			$run=mysqli_query($con,$user);
			$new=mysqli_fetch_array($run);

			$name=$new['name'];
			$image=$new['image'];
			if (strlen($content)==0 && strlen($upload_image)>=1) {
				echo "
	<div class='row'>
		<div id='col-sm-3'></div>
		<div id='posts' class='col-sm-6'>
			<div class='row'>
				<div class='col-sm-2'>
		<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
		</div>
		<div class='col-sm-6'>
			<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='#'>$name</a></h3>
			<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
		</div>
		<div class='col-sm-4'>
		</div>
		<div class='col-sm-12'>
			<center><img src='images/$upload_image' style='height:350px;'></center>
		</div>
		</div><br>
		
		<a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>&nbspComment </button></a><br>
	</div>
	<div class='col-sm-3'></div>
	</div><br><br>";
			}
	elseif (strlen($content)>=1&&strlen($upload_image)>=1) {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='#'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'><br>
					<center><p>$content</p>
					<img src='images/$upload_image' style='height:350px;'></center>
				</div>
			</div><br>
		
			<a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>&nbspComment </button></a><br>
		</div>
		<div class='col-sm-3'></div>
	</div><br><br>";
	}	
	else {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='#'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'>
					<h3><p>$content</p></h3>
				</div>
			</div><br>
		
			<a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>&nbspComment </button></a><br>
		</div>
		<div class='col-sm-3'></div>
	</div><br><br>";
	}

		}

		include("pageination.php");
	}
function search($group_id){
	global $con;
	if (isset($_POST['search'])) {
		$search_query=htmlentities($_POST['info_query']);
		}
		$get_posts="select * from posts where group_id='$group_id' AND post_content like '%$search_query%'";

		$run_posts=mysqli_query($con,$get_posts);
		while ($row_posts=mysqli_fetch_array($run_posts,MYSQLI_ASSOC)) {
			$post_id=$row_posts['post_id'];
			$group_id=$row_posts['group_id'];
			$content=$row_posts['post_content'];
			$post_date=$row_posts['post_date'];

			$group="select * from groups where group_id='$group_id' AND posts='yes'";
			$run_group=mysqli_query($con,$group);
			$row_group=mysqli_fetch_array($run_group);

			$group_name=$row_group['group_name'];
			$group_image=$row_group['group_image'];
			echo "<center>
				<div id='posts'>
	<p><img src='groups/$group_image' width='50' height='50'></p>
	<h3><a href='profile.php?id=$group_id'>$group_name</a></h3>
	<p>Updated a post on $post_date</p>
	<p>$content</p>

	<a href='single.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-address-book'>&nbspView</button></a>
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-trash'>&nbspDelete</button></a>
	</div></center><br>
			";
			include("delete_post.php");
		}
}

	function singlePost(){

		if (isset($_GET['post_id'])) {
			global $con;
			$get_id=$_GET['post_id'];
			$get_posts="select * from posts where post_id='$get_id' ";
			$run_posts=mysqli_query($con,$get_posts);
			$row_posts=mysqli_fetch_array($run_posts);

			$post_id=$row_posts['post_id'];
			$group_id=$row_posts['group_id'];
			$content=$row_posts['post_content'];
			$upload_image=$row_posts['file'];
			$post_date=$row_posts['post_date'];
			$id=$row_posts['student_id'];

			$user="select * from users where student_id='$id' ";
			$run=mysqli_query($con,$user);
			$row_group=mysqli_fetch_array($run);

			$name=$row_group['name'];
			$image=$row_group['image'];
			$group_com=$_SESSION['group_id'];

			$get_com="select * from groups where group_id='$group_com'";

			$run_com=mysqli_query($con,$get_com);
			$row_com=mysqli_fetch_array($run_com);
			if (strlen($content)==0 && strlen($upload_image)>=1) {
				echo "
	<div class='row'>
		<div id='col-sm-3'></div>
		<div id='posts' class='col-sm-6'>
			<div class='row'>
				<div class='col-sm-2'>
		<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
		</div>
		<div class='col-sm-8'>
			<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>&nbsp$name</a></h3>
			<h4>&nbsp<small style='color:black;'>&nbspUpdated a post on <strong>$post_date</strong></small></h4>
		</div>
		<div class='col-sm-4'>
		</div>
		<div class='col-sm-12'>
			<center><img src='images/$upload_image' style='height:350px;'></center>
		</div>
		</div><br>
		
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i>&nbspDelete</button></a>
	</div><br>
	</div>
	<div class='col-sm-3'></div>
	<br><br>";
			}
	elseif (strlen($content)>=1&&strlen($upload_image)>=1) {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'><br>
					<center><p>$content</p>
					<img src='images/$upload_image' style='height:350px;'></center>
				</div>
			</div><br>
		
			
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i>&nbspDelete</button></a>
	</div><br>
	</div>
	<div class='col-sm-3'></div><br><br>";
	}	
	else {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'>
					<h3><p>$content</p></h3>
				</div>
			</div><br>";
			if ($id==$_SESSION['student_id']) {
				echo "
			
		
		
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i></i>&nbspDelete</button></a>
	</div><br><br>
		</div>
		<div class='col-sm-3'></div>
	<br><br>";}
	}

			echo "
				<center><h2>Comments</h2>

			";
			include("comment.php");

			echo "
			<br>
 			<form method='post' id ='reply'>
 				<textarea cols='45' rows='5' name='comment' placeholder='Comment....'></textarea><br>
 				<input type='submit' name='reply' value='Comment'>
 			</form></center>
				";

			if (isset($_POST['reply'])) {
				$id=$_SESSION['student_id'];

				$comment=$_POST['comment'];
				$insert="insert into comments (post_id,	group_id,student_id,	comment,	com_author,	date) values('$post_id','$group_id','$id', '$comment','$name',NOW())";
				$run=mysqli_query($con,$insert);
				echo "<script>alert('Your reply has been added!')</script>";

				echo "<script>window.open('single.php?post_id=$post_id','_self')</script>";
			}

		}
	}
	function description(){

		global $con;

		$group_id=$_SESSION['group_id'];
 	
 		$query="select * from groups where group_id='$group_id' ";
 		$run=mysqli_query($con,$query);
 		$rows=mysqli_fetch_array($run,MYSQLI_ASSOC);
 		$name=$rows['group_name'];
 		$des=$rows['group_des'];
 		$admin1=$rows['admin_id'];

 		
 		

 	echo 
 	"<form method='post'>
	<div id='des'>
	<h1>$name</h1><br>";
	if ($_SESSION['student_id']==$admin1) {
 			echo "
	<button name='edit' id='edit'>Edit</button>";}
	echo "
		<p>$des</p>
	</div>
	</form>";
	if (isset($_POST['edit'])) {
		echo "<form method='post'>
	<div id='des'>

	<h1>$name</h1><br>
	
	<textarea name='des' cols='45' rows='5'>$des</textarea><br>
	<button name='done'>Done</button>
	<button name='cancel'>Cancel</button>
	</div>
	</form>";}

	if (isset($_POST['done'])) {
		$d=$_POST['des'];
		echo $d;
		$do="update groups set group_des ='$d' where group_id='$group_id'";
		$r=mysqli_query($con,$do);
		if($r){
			echo "<script>alert('Your description has been updated!')</script>";
			echo "<script>window.open('description.php','_self')</script>";
		}
	  }
	if (isset($_POST['cancel'])) {
		echo "<script>window.open('description.php','_self')</script>";
	} 
	

}
	function group_post(){
		global $con;
		$group_id=$_SESSION['group_id'];
		
		$get_posts="select * from posts where group_id='$group_id' ORDER BY 1 DESC LIMIT 15";

		$run_posts=mysqli_query($con,$get_posts);
		while ($row_posts=mysqli_fetch_array($run_posts,MYSQLI_ASSOC)) {
			$post_id=$row_posts['post_id'];
			$group_id=$row_posts['group_id'];
			$student_id=$row_posts['student_id'];
			$content=$row_posts['post_content'];
			$upload_image=$row_posts['file'];
			$post_date=$row_posts['post_date'];

			$group="select * from groups where group_id='$group_id' AND posts='yes'";
			$run_group=mysqli_query($con,$group);
			$row_group=mysqli_fetch_array($run_group);

			$group_name=$row_group['group_name'];

			$group_image=$row_group['group_image'];


			$group="select * from users where student_id='$student_id'";
			$run_group=mysqli_query($con,$group);
			$row_group=mysqli_fetch_array($run_group);

			$name=$row_group['name'];
			$image=$row_group['image'];
			if (strlen($content)==0 && strlen($upload_image)>=1) {
				echo "
	<div class='row'>
		<div id='col-sm-3'></div>
		<div id='posts' class='col-sm-6'>
			<div class='row'>
				<div class='col-sm-2'>
		<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
		</div>
		<div class='col-sm-8'>
			<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>&nbsp$name</a></h3>
			<h4>&nbsp<small style='color:black;'>&nbspUpdated a post on <strong>$post_date</strong></small></h4>
		</div>
		<div class='col-sm-4'>
		</div>
		<div class='col-sm-12'>
			<center><img src='images/$upload_image' style='height:350px;'></center>
		</div>
		</div><br>
		
		<a href='single.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info fa fa-address-book'>&nbspView</button></a>
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i>&nbspDelete</button></a>
	</div><br>
	</div>
	<div class='col-sm-3'></div>
	</div><br><br>";
			}
	elseif (strlen($content)>=1&&strlen($upload_image)>=1) {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'><br>
					<center><p>$content</p>
					<img src='images/$upload_image' style='height:350px;'></center>
				</div>
			</div><br>
		
			<a href='single.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info fa fa-address-book'>&nbspView</button></a>
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i>&nbspDelete</button></a>
	</div><br>
	</div>
	<div class='col-sm-3'></div>
	</div><br><br>";
	}	
	else {
		echo "
			<div class='row'>
				<div id='col-sm-3'></div>
			<div id='posts' class='col-sm-6'>
				<div class='row'>
					<div class='col-sm-2'>
					<p><img src='images/$image' class='img-circle'  width='100px' height='100px'/></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='profile.php?u_id=$group_id'>$name</a></h3>
							<h4>&nbsp<small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
				<div class='col-sm-4'>
				</div>
				<div class='col-sm-12'>
					<h3><p>$content</p></h3>
				</div>
			</div><br>
		
			<a href='single.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info fa fa-address-book'>&nbspView</button></a>
	<a href='edit_post.php?post_id=$post_id' style='float: right;'>
	<button class='fa fa-edit btn btn-info'>&nbspEdit</button></a>
	<a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
	<button class='btn btn-info'><i class='far fa-trash-alt'></i></i>&nbspDelete</button></a>
	</div><br><br>
		</div>
		<div class='col-sm-3'></div>
	</div><br><br>";
	}

	}
			include("delete_post.php");
}
	
 ?>
