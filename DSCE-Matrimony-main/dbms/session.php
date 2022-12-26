<?php
    include('config.php');
    session_start();
    


    $user_check = $_POST['username'];
    $pass_check = $_POST['password'];    
    $ses_sql = mysqli_query($conn,"select * from users where username = '$user_check' and password = '$pass_check' ");
    
    $isexist = mysqli_num_rows($ses_sql);

    if($isexist == 1)
    {
        echo 'success';
        $_SESSION['user_login'] = 1;
        $sql =  mysqli_query($conn,"select * from preferences where username = '$user_check'");
        $isexist1 = mysqli_num_rows($sql);
        if($isexist1 != 1)
        {
            header("location: set_preferences.php?username=" . $user_check);
        }
        else
        {
            header("location: test.php?user_check=" . $user_check) ;
        }

        
        
    }

    
    
     else{
        echo '<script type="text/javascript">'; 
        echo 'alert("INVALID USERNAME OR PASSWORD");'; 
        echo 'window.location= "log_in.php";';
        echo '</script>';
         
     }
 ?>