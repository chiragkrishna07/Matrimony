<?php 
    include('config.php');
    session_start();

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

    $cur_user = $_GET['username'];
    $vis_user = $_GET['vis_user'];

    $sql = "SELECT * FROM users where username='$vis_user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    // $sql = "SELECT * FROM users where username='$cur_user'";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);

    $sql2 = mysqli_query($conn,"SELECT * FROM preferences where username = '$vis_user'");

    $isexist = mysqli_num_rows($sql2);

    if($isexist == 1)
    {
        $sql1 = "SELECT * FROM preferences where username='$vis_user'";
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
       // echo 'error';
             
     }


?>

<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1><?php echo $row['name'] ?></h1>
    <form action = "profile_bookmark_php.php" method = "post">
    <fieldset>

        <?php echo "<center><img src = 'uploads/".$row['profpic']."' height='300' width='200'></center>"; ?>


        <!--<label>Your username:--> <input type="text" name="myusername" value="<?php echo $cur_user?>" style="visibility:hidden" readonly /></label>

        <label>Name: <input type="text" name="name" value="<?php echo $row['name']?>" readonly /></label>

        <label>Username: <input type="text" name="username" value="<?php echo $row['username']?>" readonly/></label>

        <label>Email: <input type="email" name="email" value="<?php echo $row['email']?>" readonly /></label>

        <label>Phone number: <input type="number" name="phno" value="<?php echo $row['phno']?>" readonly/></label>

    </fieldset>
    <fieldset>

        <!-- <label>Profile Picture: <input type="text" name="profpic" value="<?php //echo $row['profpic']?>" readonly/></label> -->

        <label>Age (years): <input type="number" name="age" min="18" max="120" value="<?php echo $row['age']?>" readonly/></label>

        <label>Salary (per annum): <input type="number" name="sal" value="<?php echo $row['sal']?>" readonly/></label>

        <label>Gender: <input type="test" name="gender"  value="<?php echo $row['gender']?>" readonly/></label>

        <label>Place: <input type="text" name="place" style="text-transform:uppercase" value="<?php echo $row['place']?>" readonly /></label>

        <label>Religion: <input type="text" name="religion" style="text-transform:uppercase" value="<?php echo $row['religion']?>" readonly/></label>

        <label>Bio:
            <textarea name="bio" rows="3" cols="30"  readonly><?php echo $row['bio']?></textarea>
        </label>

    </fieldset>
    <fieldset>
        <h1><?php echo $row['name'] ?>'s Preferences</h1>
        
        <!-- <h1>Edit your Preferences</h1> -->

        <!--<label>Your username: <input type="text" name="username" value="<?php //echo $cur_user ?>" style="visibility:hidden;" readonly/></label>-->

        <label>Minimum Age (years): <input type="number" name="pref_lowage" min="18" max="120" value = "<?php if($isexist == 1) echo $pref_lowage ?>" /></label>

        <label>Maximum age (years): <input type="number" name="pref_highage" min="18" max="120" value = "<?php if($isexist == 1) echo $pref_highage ?>" /></label>

        <label>Minimum Salary (per annum): <input type="number" name="pref_lowsal" value = "<?php if($isexist == 1) echo $pref_lowsal ?>" /></label>

        <label>Place: <input type="text" name="pref_place" style="text-transform:uppercase"  value = "<?php if($isexist == 1) echo $pref_place ?>" /></label>

        <label>Religion: <input type="text" name="pref_religion" style="text-transform:uppercase"  value = "<?php if($isexist == 1) echo $pref_religion ?>"/></label>

        <label>Expectation from partner:
            <textarea name="pref_expectations" rows="3" cols="30" ><?php if($isexist == 1) echo $pref_expectations ?></textarea>
        </label>



    <input type="submit" value="Bookmark user?" />
    </fieldset>
    </form>

    <form action="send_msg.php" method = "post">
        <fieldset>

            <!--<label>Your username: --><input type="text" name="from_username" value="<?php echo $cur_user ?>" style="visibility:hidden;" readonly/></label>
    
            <!--<label>Your username: --><input type="text" name="to_username" value="<?php echo $vis_user ?>" style="visibility:hidden;" readonly/></label>

            <label><h2>Message <?php echo $vis_user?> :</h2><p>Message should be less than 50 characters and should not violate community guidelines. These messages are monitored.</p>
            <textarea name="msg" rows="3" cols="30" ></textarea>
            </label>
            <input type="submit" value="Send"/>
    </fieldset>
    </form>





    <form action="go_home.php" method = "post">
                    <input type = "text" name = "gousername" value = "<?php echo $cur_user; ?>" style = "visibility:hidden;"  />
                    <input type = "submit" value="Home"/>
        </form>
    <form action="logout.php" method = "post">
                    <input type = "submit" value="Logout"/>
        </form>
</body>