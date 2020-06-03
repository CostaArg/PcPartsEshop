<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/form.css">
        <title>Register</title>
  </head>
  <body>

    <div id="homeContainer">
      <a class="homeButton" href="/eshop/index.php">Home Page</a>
    </div>

    <div class="login-page">
      <div class="form">
        <form class="register-form" action="register.php" method="POST">
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password" placeholder="password"/>
          <input type="email" name="email" placeholder="email address"/>
          <button>register</button>
          <p class="message">Already registered? <a href="/eshop/loginform.php">Sign In</a></p>
        </form>
      </div>
    </div>

  </body>
</html>
