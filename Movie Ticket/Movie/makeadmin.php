<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"movie_booking");
	$user = $_POST['user'];
	$sql = "select * from users_tbl where username='$user'";
	$result= mysqli_query($con,$sql);
	$num = mysqli_numrows($result);
	if(	$num==0)
	{
		echo "No such user exist";
	}
	else
	{
	 $sql = "Update users_tbl set userlevel='9' where username='$user'";
	 $result = mysqli_query($con,$sql);
	 if($result)
	 {
		 echo "Selected user was made admin<br>";
	 }
	}
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>