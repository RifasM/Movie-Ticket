<?php
ob_start();
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

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = md5($mypassword);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = mysqli_real_escape_string($con,$mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$myemail=mysqli_fetch_array($result,0,"email");
$userlevel=mysqli_fetch_array($result,0,"userlevel");
session_start("myusername");
session_start("mypassword");
header("location:first.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>


