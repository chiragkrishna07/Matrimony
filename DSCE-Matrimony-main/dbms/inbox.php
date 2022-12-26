<?php
    include('config.php');
    session_start();
    


    $username = $_POST['username'];
    
?>
<!DOCTYPE html>
<head>
    <title>INBOX</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <center>
        <fieldset>
            <h1>YOUR INBOX</h1>
            <table style = "width:100%;" border=1>
                <tr>
                    <th>USER</th>
                    <th>MESSAGE</th>

                </tr>

                <?php
                    $sql1 = "SELECT * FROM message WHERE to_user='$username'";
                    $result1 = mysqli_query($conn,$sql1);
                    //$rows = mysqli_fetch_assoc($result1);
                    $count = mysqli_num_rows($result1);
                    
                    for($i=0;$i<$count;$i++)
                    {
                        $rows = mysqli_fetch_assoc($result1);
                        $from_user = $rows['from_user'];
                        $msg = $rows['msg'];

                        echo"<tr>
                                <td>$from_user</td>
                                <td>$msg</td>
                            </tr>";
                        
                    }
                    




                    ?>
                    </table>
                </fieldset>
                <center>
                <form action="go_home.php" method = "post">
                    <input type = "text" name = "gousername" value = "<?php echo $username; ?>" style = "visibility:hidden;"  />
                    <input type = "submit" value="Home"/>
        </form>

    <form action="logout.php" method = "post">
                    <input type = "submit" value="Logout"/>
        </form>
</body>