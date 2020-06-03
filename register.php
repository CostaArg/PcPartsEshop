<?php
require_once("connect.php");

$name = $_POST['cust_na'];
$password = $_POST['cust_pa'];
$email = $_POST['cust_em'];

$succeed = mysqli_query($conn,"INSERT INTO REGISTRATION (NAME, PASS, EMAIL) VALUES ('$name', SHA1('$pass'), '$email')");

  if ($succeed)
  {
    $answer = "The record was added";
  }
  else
  {
    $answer = "Error, record couldn't be added";
  }

$conn->close();
?>
