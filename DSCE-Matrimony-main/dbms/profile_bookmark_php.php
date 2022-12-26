<?php 
    include('config.php');
    session_start();

    $username = $_POST['myusername'];
    $vis_user = $_POST['username'];

    $sql1 = "SELECT * FROM users where username='$username'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = mysqli_query($conn,"SELECT * FROM users where username = '$vis_user'");
    $row2 = mysqli_fetch_assoc($sql2);

    $myusername = $row1['username'];
    $vis_username = $row2['username'];
    $vis_name = $row2['name'];
    
     $sql = "INSERT INTO bookmarked_profiles VALUES('$myusername','$vis_username','$vis_name');";
     $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        // echo '<script type="text/javascript">'; 
        // echo 'alert("USER BOOKMARKED");'; 
        // echo '</script>';
        // //$_SESSION['user_login'] = 1;
        header("location: test.php?popup=SUCCESS&user_check=" . $username) ;
    }
    else{
         echo 'query failed';
    }
?>
