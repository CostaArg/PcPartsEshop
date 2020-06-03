<?php
require_once("connect.php");
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$succeed = mysqli_query($conn,"INSERT INTO REGISTRATION (USERNAME, PASSWORD, EMAIL) VALUES ('$username', SHA1('$password'), '$email')");

  if ($succeed)
  {
    echo "You are now registered";
    header("Refresh: 3; index.php");
  }
  else
  {
    echo "Error - Registration failed";
    header("Refresh: 3; index.php");
  }

$conn->close();
?>
