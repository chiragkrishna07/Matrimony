
<?php 
session_start();
include('config.php');
$cur_user = $_GET['user_check'];
if(isset($_GET['popup']))
{
    $popup = $_GET['popup'];
    if($popup == "PREFSET")
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("PREFERENCES SUCCESSFULLY SET");'; 
        echo '</script>'; 
    }
    else if($popup == "SAME_GENDER")
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("USER BELONGS TO SAME GENDER");'; 
        echo '</script>';
    }
    else if($popup == "INV_USER")
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("INVALID REQUEST");'; 
        echo '</script>';
    }
    else if($popup == "SUCCESS")
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("REQUEST SUCCESSFUL");'; 
        echo '</script>';
    }
}


$sql = "SELECT * FROM users where username='$cur_user'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$sql3 = mysqli_query($conn,"SELECT * FROM preferences where username='$cur_user';");
$row3 = mysqli_fetch_assoc($sql3);

$pref_lowsal = $row3['pref_lowsal'];
$pref_lowage = $row3['pref_lowage'];
$pref_highage = $row3['pref_highage'];
$pref_place = $row3['pref_place'];
$pref_religion = $row3['pref_religion'];
$pref_expectations = $row3['pref_expectations']; 





$gender = $row['gender'];



?>
<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>WELCOME <?php echo $row['name'] ?></h1>

    <form action="inbox.php" method="post">
        <fieldset>
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label> 
        </fieldset>
        <input type = "submit" value="INBOX"/>
    </form>



    <form action = "test_search_php.php" method = "post">
        <fieldset>
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label> 
            <label>Search by username: <input type="text" name="vis_user"  required /></label>
            <input type = "submit" value = "Search" />
        </fieldset>
    </form>
    <form>
        <center>
        <fieldset>
            <h2>BOOKMARKED USERS</h1>
            <table style = "width:100%;" border=1>
                <tr>
                    <th>USER_NAME</th>
                    <th>NAME</th>

                </tr>
                <?php 
                    $sql1 = "SELECT * FROM bookmarked_profiles WHERE myusername='$cur_user'";
                    $result1 = mysqli_query($conn,$sql1);
                    //$rows = mysqli_fetch_assoc($result1);
                    $count = mysqli_num_rows($result1);
                    
                    for($i=0;$i<$count;$i++)
                    {
                        $rows = mysqli_fetch_assoc($result1);
                        $vis_username = $rows['vis_username'];
                        $vis_name = $rows['vis_name'];

                        echo"<tr>
                                <td>$vis_username</td>
                                <td>$vis_name</td>
                            </tr>";
                        
                    }
                ?>
                
            </table>
        </filedset>
        <fieldset>
            <h2>SOME PROFILES THAT YOU MAY LIKE:</h2>
            <table style = "width:100%;" border=1>
                <tr>
                    <th>USER_NAME</th>
                    <th>NAME</th>

                </tr>
                <?php 
                    $sql2 = "SELECT * FROM users WHERE gender != '$gender' and ( sal >= '$pref_lowsal' or (age between 'pref_lowage' and 'pref_highage') or place = '$pref_place' or religion = '$pref_religion') AND (username NOT IN(SELECT blocked_user FROM block WHERE block_by_user='$cur_user'));";
                    $result2 = mysqli_query($conn,$sql2);
                    //$rows = mysqli_fetch_assoc($result1);
                    $count2 = mysqli_num_rows($result2);

                    for($i=0;$i<$count2;$i++)
                    {
                        $rows5 = mysqli_fetch_assoc($result2);
                        $username1 = $rows5['username'];
                        $name1 = $rows5['name'];

                        echo"<tr>
                                <td>$username1</td>
                                <td>$name1</td>
                            </tr>";
                        
                    }


                    ?>
                    </table>
                </fieldset>
                </center>
    </form>

    <form action="block.php" method="post">
        <fieldset>
            <h1>BLOCK USER</h1> 
            <label>Enter the username: <input type="text" name="blocked_user"  required /></label>
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label>
            <input type="submit" value="BLOCK USER"/>
                </fieldset>
                </form>


    <form action="unblock.php" method="post">
        <fieldset>
            <h1>UNBLOCK USER</h1> 
            <label>Enter the username: <input type="text" name="unblocked_user"  required /></label>
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label>
            <input type="submit" value="UNBLOCK USER"/>
                </fieldset>
                </form>

    <form action="deactivate_user.php" method="post">
        <fieldset>
            <h1>FOUND YOUR BETTER HALF?</h1> 
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label>
            <input type="submit" value="DEACTIVATE ACCOUNT"/>
                </fieldset>
                </form>


        <form action="logout.php" method = "post">
                    <input type = "submit" value="Logout"/>
        </form>
</body>