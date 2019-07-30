<style>
	.update{
		margin-left: 400px;
		margin-right: 500px;
		margin-top: 50px;
		background-color: #5C4D37;
		text-align: center;
		line-height: 25px;
		font-size: 30px;
		color: orange;
		height: 600px;
	}
	h3{
		padding-top: 10px;
		color: orange;
	}
	form{
		margin-top: 50px;
	}
	body{
		background-color: #7C7155;
	}
	input{
		font-size: 20px;
	}
	a{
		text-decoration: none;
	}
</style>

<?php
	include("includes/connection.php");
	error_reporting(0);

	$_GET['gn'];
	$_GET['d'];
	$_GET['b'];
	//$_GET['id'];
	$idd = $_GET['id'];
	//echo $idd;
?>

<html>
<head>
	<title></title>
</head>
	<body>
		<div class="update">
			<h3>Edit Form</h3>
			<hr>
		<form action="" method="GET">
			Group Name <input type="text" name="gname" value="<?php echo $_GET['gn']; ?>"/><br><br>
			Department <input type="text" name="dept" value="<?php echo $_GET['d']; ?>"/><br><br>
			Batch <input type="text" name="batch" value="<?php echo $_GET['b']; ?>"/><br><br>
			<input type="submit" name="submit" value="Update">
		</form>



		<?php 
		if($_GET['submit']){
			$gn = $_GET['gname'];
			$d = $_GET['dept'];
			$b = $_GET['batch'];
			//$id = $_GET['id'];

				$query = "update groups set group_name = '$gname', department = '$d', Batch = '$b' where group_id = '$idd'";
				$data = mysqli_query($con, $query);

				if($data){
					echo "Data updated successfully.<br/><br/><a href= 'admin.php'><font color = 'white'>Click here for the updated list</a>";
				}
			else{
				echo "All fields are requried";
			}
		}
	
		 ?>

	</body>
</html>
