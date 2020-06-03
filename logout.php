<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
echo "You are now being logged out";
header("Refresh: 3; index.php"); // Redirecting To Home Page
}
?>
