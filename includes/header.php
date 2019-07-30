<?php
include 'includes/connection.php';
include("functions/function.php");

?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
			<a class="navbar-brand" href="home.php" >&nbspBu Mirror</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav ">
				
<?php
					$group=$_SESSION['group_id'];
					$student_id=$_SESSION['student_id'];
					$get_group="select * from groups where group_id='$group'";
					$run_group=mysqli_query($con,$get_group);
					$row= mysqli_fetch_array($run_group);

					$group_id=$row['group_id'];
					$group_name=$row['group_name'];
					$group_des=$row['group_des'];
					$group_image=$row['group_image'];
					$group_dept=$row['department'];
					$group_batch=$row['Batch'];
					$reg_date=$row['group_created'];
					$admin1=$row['admin_id'];

					$group_posts= "select * from posts where group_id= '$group_id'";
					$run_post= mysqli_query($con, $group_posts);
					$posts= mysqli_num_rows($run_post);
					$get_user="select * from users where student_id='$student_id'";
					$run=mysqli_query($con,$get_user);
					$r= mysqli_fetch_array($run);
					$name=$r['name'];

					$app="select * from users where group_id='$group_id' AND approved='0'";
					$rr=mysqli_query($con,$app);
					$num=mysqli_num_rows($rr);
					$members="select * from users where group_id='$group_id' AND approved='1'";
					$run_members=mysqli_query($con,$members);
					$total=mysqli_num_rows($run_members);

?>
				<li><a class="fa fa-user" href='profile.php?<?php echo "&nbspgroup_id=$group_id" ?>'>&nbsp<?php  echo "$group_name";  ?></a></li>
					<li><a class="fas fa-home" href="home.php">&nbspHome</a></li>
					<li><a  class="fas fa-certificate" href="description.php">&nbspDescription</a></li>
					<li><a  class="fas fa-grin-stars" href="user_profile.php">&nbspAbout <?php echo "$name"; ?></a></li>
				<?php
					echo "
						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true'  aria-expanded='false'><span><i class='fas fa-angle-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a  class='fab fa-accusoft' href='our_post.php?group_id=$group_id'>Group Posts <span class='badge badge-secondary'>$posts</span>
									</a>
								</li>
								<li>
									<a  class='fas fa-users' href='members.php?group_id=$group_id'>Members <span class='badge badge-secondary'>$total</span>
									</a>
								</li>";
								if ($student_id==$admin1) {
									echo " <li>
									<a  class='fab fa-asymmetrik' href='approval_request.php?group_id=$group_id'>Approval Requests <span class='badge badge-secondary'>$num</span>
									</a>
								</li>
								<li>
									<a class='far fa-edit' href='edit_profile.php?group_id=$group_id'>Edit Account</a>
								</li>";
								}

								echo "
								
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>
								</li>
							</ul>
						</li>
					";
				 ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="post" action="results.php">
						<div class="form-group">
							<input type="text" name="info_query" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav><br><br>