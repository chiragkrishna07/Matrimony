<?php 
    include('config.php');
    session_start();

    $username = $_POST['username'];
    $feedback = $_POST['feedback'];

    $sql = mysqli_query($conn,"INSERT INTO feedback values('$username','$feedback')");
    if($sql == TRUE)
    {
        session_destroy(); //destroy the session
        header("location:log_in.php"); 
        exit();
    }
    else{
        header("location:exit_page.php");
    }
    ?>