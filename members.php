<?php

  session_start();
  include("includes/header.php");
?>
<?php 
  if (!isset($_SESSION['group_id'])) {
    header("location: index.php");
  }
     $group_id=$_SESSION['group_id'];

    $get_group="select * from groups where group_id='$group_id'";
    $run_group=mysqli_query($con,$get_group);
    $row= mysqli_fetch_array($run_group);
    $group_name=$row['group_name'];

    $mem="select * from users where group_id='$group_id' AND approved='1'";
    $run_mem=mysqli_query($con,$mem);
    
    
?>

<html>
<head>
  <title>Members of <?php echo $group_name; ?></title>
  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="style/home_style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <script src="style/jquery.min.js"></script>
    <script src="style/bootstrap.min.js"></script>
</head>
<body>
  
<div style="margin-top: 40px; padding: 40px;">
            <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Email</th>
                        <th colspan="2"></th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				while($members = mysqli_fetch_array($run_mem))
				{
          $name=$members['name'];
          $id=$members['student_id'];
          $email=$members['email'];

					echo "<tr>
                        <td>$name</td>
                        <td>$id</td>
                        <td>$email</td>
                        <td></td>
                      </tr>";
				}
				?>
                    </tbody>
</table>
              </div>

  </body>
  </html>

  <?php 
include 'templates/footer.php';
?>