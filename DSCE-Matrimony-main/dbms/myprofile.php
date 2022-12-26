<?php 
    include('config.php');
    session_start();

    $cur_user = $_GET['username'];
   // $vis_user = $_GET['vis_user'];

   if(isset($_GET['popup']))
    {
        $popup = $_GET['popup'];
        if($popup == "SUCCESS")
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("REQUEST SUCCESSFUL");'; 
            echo '</script>';
        }
    }

    $sql = "SELECT * FROM users where username='$cur_user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 = mysqli_query($conn,"SELECT * FROM preferences where username = '$cur_user'");

    $isexist = mysqli_num_rows($sql2);

    if($isexist == 1)
    {
        $sql1 = "SELECT * FROM preferences where username='$cur_user'";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);

        $pref_lowsal = $row1['pref_lowsal'];
        $pref_lowage = $row1['pref_lowage'];
        $pref_highage = $row1['pref_highage'];
        $pref_place = $row1['pref_place'];
        $pref_religion = $row1['pref_religion'];
        $pref_expectations = $row1['pref_expectations']; 

        
    }
    else{
        echo 'error';
             
     }




?>

<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1><?php echo $row['name'] ?></h1>
    <form action = "edit_profile.php" method = "post">
    <fieldset>

        <?php echo "<center><img src = 'uploads/".$row['profpic']."' height='300' width='200'></center>"; ?>

        <!--<label>Your username: --><input type="text" name="myusername" value="<?php echo $cur_user?>" style="visibility:hidden;" readonly/></label>

        <label>Name: <input type="text" name="name" value="<?php echo $row['name']?>"  readonly/></label>

        <label>Username: <input type="text" name="username" value="<?php echo $row['username']?>" readonly/></label>

        <label>Email: <input type="email" name="email" value="<?php echo $row['email']?>"  /></label>

        <label>Phone number: <input type="number" name="phno" value="<?php echo $row['phno']?>" /></label>

        <!-- <label>Create a New Password: <input type="password" name="password" pattern="[a-z0-5]{8,}" placeholder="8 characters with at leat one char and one no " required /></label> -->

    </fieldset>
    <fieldset>

        <!-- <label>profile picture: <input type="text" name="profpic" value="<?php// echo $row['profpic']?>" /></label> -->

        <label>age (years): <input type="number" name="age" min="18" max="120" value="<?php echo $row['age']?>"/></label>

        <label>salary (per annum): <input type="number" name="sal" value="<?php echo $row['sal']?>" /></label>

        <label>gender: <input type="test" name="gender"  value="<?php echo $row['gender']?>" /></label>

        <label>Place: <input type="text" name="place" style="text-transform:uppercase" value="<?php echo $row['place']?>"  /></label>

        <label>Religion: <input type="text" name="religion" style="text-transform:uppercase" value="<?php echo $row['religion']?>" /></label>

        <label>bio:
            <textarea name="bio" rows="3" cols="30" ><?php echo $row['bio']?></textarea>
        </label>

    </fieldset>
    <input type="submit" value="Edit" />
    </form>

    <form action = "edit_image.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <!--<label>Your username: --><input type="text" name="username" value="<?php echo $cur_user?>" style="visibility:hidden;" readonly/></label>

            Edit profile picture:<br/><input type = "file" name = "image"/>

            <input type="submit" value="edit profile pic"/>
    </fieldset>
    </form>


    <form action = "update_preferences.php" method = "post">
    <fieldset>
        <h1>Edit your Preferences</h1>

        <!--<label>Your username: --><input type="text" name="username" value="<?php echo $cur_user ?>" style="visibility:hidden;" readonly/></label>

        <label>Minimum Age (years): <input type="number" name="pref_lowage" min="18" max="120" value = "<?php echo $pref_lowage ?>" /></label>

        <label>Maximum age (years): <input type="number" name="pref_highage" min="18" max="120" value = "<?php echo $pref_highage ?>" /></label>

        <label>Minimum Salary (per annum): <input type="number" name="pref_lowsal" value = "<?php echo $pref_lowsal ?>" /></label>

        <label>Place: <input type="text" name="pref_place" style="text-transform:uppercase"  value = "<?php echo $pref_place ?>" /></label>

        <label>Religion: <input type="text" name="pref_religion" style="text-transform:uppercase"  value = "<?php echo $pref_religion ?>"/></label>

        <label>Expectation from partner:
            <textarea name="pref_expectations" rows="3" cols="30" ><?php echo $pref_expectations ?></textarea>
        </label>
</fieldset>
    <input type="submit" value="Edit Preferences" />
    </form>

    <form action="go_home.php" method = "post">
                    <input type = "text" name = "gousername" value = "<?php echo $cur_user; ?>" style = "visibility:hidden;"  />
                    <input type = "submit" value="Home"/>
        </form>

    <form action="logout.php" method = "post">
                    <input type = "submit" value="Logout"/>
        </form>
</body>