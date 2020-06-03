<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['username'];
$password=sha1($_POST['password']);
$connection = mysql_connect("localhost", "root", "");
// To protect SQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("eshopdb", $connection);
// SQL query to fetch information of registered users and finds the matching users.
$query = mysql_query("select * from registration where password='$password' AND username='$username'", $connection);
if ($query){
	$rows = mysql_num_rows($query);

	if ($rows == 1) {
		$_SESSION['username']=$username; // Initializing Session
		header("location: index.php"); // Redirecting To Other Page
	} else {
		$error = "Username or Password is invalid";
	}
}

else {
	// error
}
mysql_close($connection); // Closing Connection
}
?>
