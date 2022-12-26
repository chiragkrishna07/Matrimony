<?php
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="stylelogin.css" />
  </head>
  <body>
    <h1>Login</h1>
    <!-- <p>Welcome</p> -->
    <form action='session.php' method='post'>
      <fieldset>
        <label>Enter Your Username: <input type="text" name="username" required /></label>
        <label>Enter your Password: <input type="password" name="password" required /></label>
      </fieldset>
      
      <input type="submit" value="Submit" name="login_user" /> <br/><button name="register" onclick="window.location.href='index.php'">Register</button>
    </form>
  </body>
</html>