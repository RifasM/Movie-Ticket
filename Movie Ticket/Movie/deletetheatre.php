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
	$t = $_POST['theatre'];
	?>
<?
	 $sql = "Delete from theatre where theatre_name='$t'";
	 $result = mysqli_query($con,$sql);
	 if($result)
	 {
		 echo "Theatre Removed From Database<br>";
	 }
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>
