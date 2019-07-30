<style>
	tr{
		font-size: 25px;
		text-align: center;
		font-weight: bold;
	}
	td{
		padding: 20px;
		text-align: center;
		font-size: 20px;
	}
	h2{
		color: #FEA102;
		font-size: 30px;
		margin-left: 300px;
		margin-top: 25px;
		padding-top: 25px;
	}
	table{
		background: white;
		margin-left: 75px;
		margin-top: 20px;

	}
	.display{
		background: white;
		margin-top: 30px;
		margin-left: 250px;
		margin-right: 300px;
		height: 650px;
	}
	body{
		background-color: #bdc3c7;
	}
	a{
		color: black;
		padding-left: 20px;
	}
	.myform{
		width: 450px;
		margin: 0 auto;
	}
	#logout_btn{
		background: red;
		width: 430px;
		padding: 5px;
		text-align: center;
		color: white;
		font-size: 18px;
		font-weight: bold;
	}
</style>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
	include("includes/connection.php");
	error_reporting(0);

$query = "SELECT * FROM groups";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);

 //echo $total;
 //echo $result['Roll']." ".$result['Name']." ".$result['Class']."<br/>";

if($total != 0)
{
	?>

<div class = "display">
	<table border="1">

		<h2>Groups</h2>
		<hr>
		<tr>
			<th> Group Name</th>
			<th>Department</th>
			<th>Batch</th>
			<th colspan="2">Operations</th>
		</tr>

	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['group_name']."</td>
				<td>".$result['department']."</td>
				<td>".$result['Batch']."</td>
				<td><a href = 'update.php?gn=$result[group_name]&d=$result[department]&b=$result[Batch]&id=$result[group_id]'><font color='red'>Edit</a></td>
				<td><a href = 'delete.php?id=$result[group_id]' onclick='return checkdelete()'><font color='red'>Delete</td>
		</tr>";
	}
}
else
{
	echo "No records found";
}

?>
</table>

<script>
	function checkdelete()
	{
		return confirm('Are you sure to delete this data???');
	}
</script>

</div>
</body>
</html>
