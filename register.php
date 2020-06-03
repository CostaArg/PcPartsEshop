<?php
require_once("connect.php");
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$succeed = mysqli_query($conn,"INSERT INTO REGISTRATION (USERNAME, PASSWORD, EMAIL) VALUES ('$username', SHA1('$password'), '$email')");

  if ($succeed)
  {
    $answer = "The record was added";
  }
  else
  {
    $answer = "Error, record couldn't be added";
  }
echo $answer;
$conn->close();
?>
