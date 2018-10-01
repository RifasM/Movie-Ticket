<?
session_start();
?>
<?php
echo $movieid=$_GET["q"];
echo $cityid= $_SESSION['city'];
$con = mysqli_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db("movie_booking", $con);

$sql="SELECT * FROM movie WHERE movie_id = '".$movieid."' and status='Now Showing' and city_id='$cityid' group by date";

$result = mysqli_query($con,$sql);

	 echo "<select name ='date' id ='date'>";
	 echo "<option value=\"\">--Select Date--</option>";
while($row = mysqli_fetch_array($result))
  {
	  
	 echo "<option value=".$row['date'].">".$row['date']." </option> ";
  }
		echo "</select>";


mysqli_close($con);
?>