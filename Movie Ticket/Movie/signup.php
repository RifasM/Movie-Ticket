<?php
ob_start();
session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="movie_booking"; // Database name 
$tbl_name="users_tbl"; // Table name
// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
$mypassword2=$_POST['mypassword2'];
$myemail=$_POST['myemail'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$mypassword2 = stripslashes($mypassword2);
$myemail = stripslashes($myemail);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = md5($mypassword);
$mypassword = mysqli_real_escape_string($con,$mypassword);
$mypassword2 = md5($mypassword2);
$mypassword2 = mysqli_real_escape_string($con,$mypassword2);
$myemail = mysqli_real_escape_string($con,$myemail);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
{
if($count==1){echo "User already exist";}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email,userlevel) values ('$myusername','$mypassword','$myemail',1)";
			$result=mysqli_query($con,$sql);
			echo "Sign Up Succesfull<br><br>";
			session_start("myusername");
			session_start("mypassword");
			header("location:first.php");
	}
	else
		echo "Passwords don't match";
}
}
else
{
	echo "One or more fields are empty";
}
ob_end_flush();
?>


