<?php 
    include('config.php');
    session_start();

    $from_user = $_POST['from_username'];
    $to_user = $_POST['to_username'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO message VALUES('$from_user','$to_user','$msg'); ";
    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        // echo '<script type="text/javascript">'; 
        // echo 'alert("SUCCESSFULLY SENT");'; 
        // echo '</script>';
        header("location: profile.php?popup=SUCCESS&vis_user=".$to_user."&username=".$from_user) ;
    }
    else{
        echo 'messagefailed';
    }

    ?>