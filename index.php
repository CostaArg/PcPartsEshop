<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <header>

  <a class="homeButton" href="/eshop/index.php">Home Page</a>

<div class="wrapper">
  <a class="button" href="/eshop/loginform.php">Login</a>
  <a class="button" href="/eshop/registerform.php">Register</a>
  <a class="button" href="/eshop/logout.php">Logout</a>
  <a class="button" href="/eshop/cart.php">Cart</a>
</div>

    </header>

    <?php
    include('login.php'); // Includes Login Script
    if (isset($_SESSION['username'])){
      echo "Welcome, " . $_SESSION['username'] . "!";
    }
    ?>

    <div>
      <ul> This </ul>
      <ul> This </ul>
      <ul> This </ul>
      <ul> This </ul>
      <ul> This </ul>
      <ul> This </ul>
      <ul> This </ul>
    </div>

  </body>
</html>
