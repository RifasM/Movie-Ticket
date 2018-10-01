<?php
session_start();
?>
<?php
$con = mysqli_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db("movie_booking", $con);
?>
<?
	$city = $_POST['city'];
	?>
<?
	 $sql = "Delete from city where city_name='$city'";
	 $result = mysqli_query($sql);
	 if($result)
	 {
		 echo "City Removed From Database<br>";
	 }
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>