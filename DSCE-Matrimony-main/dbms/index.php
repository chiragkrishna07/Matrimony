<?php
    if(isset($_GET['popup']))
    {
      $popup = $_GET['popup'];
      if($popup == "DUP_USERNAME")
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("USERNAME ALREADY TAKEN");'; 
        echo '</script>';
      }
      else if($popup == "DUP_EMAIL")
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("EMAIL ALREADY REGISTERED");'; 
        echo '</script>';
      }
    }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Register here</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the required information</p>
    <form action="register_check_php.php" method='post' enctype="multipart/form-data">
      <fieldset>

        <label>Enter Your Name: <input type="text" name="name"  required /></label>

        <label>Enter Your Username Name: <input type="text" name="username"  required /></label>

        <label>Enter Your Email: <input type="email" name="email"  required /></label>

        <label>Enter Your Phone number: <input type="text" name="phno" pattern="[1-9]{1}[0-9]{9}"  required /></label>

        <label>Create a New Password: <input type="password" name="password" pattern="[a-z0-9]{8,}" placeholder="8 characters with at leat one char and one no " required /></label>

      </fieldset>
      <fieldset>

        <label>Upload profile picture: <input type="file" name="image" required /></label>

        <label>Input your age (years): <input type="number" name="age" min="18" max="120" required/></label>

        <label>Input your salary (per annum): <input type="number" name="sal" required/></label>

        <label>Gender
          <select name="gender" required>
            <!--<option value="">(select one)</option>-->
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </label>
        
        <label>Place: <input type="text" name="place" style="text-transform:uppercase" required/></label>

        <label>Religion: <input type="text" name="religion" style="text-transform:uppercase" required/></label>

        <label>Provide a bio:
          <textarea name="bio" rows="3" cols="30" placeholder="I like playing on the beach..." required></textarea>
        </label>

      </fieldset>
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>