<?php
    include('config.php');
    session_start();
    


    $username = $_POST['username'];

    $sql = mysqli_query($conn,"DELETE FROM users WHERE username = '$username'");
    $sql2 = mysqli_query($conn,"DELETE FROM bookmarked_profiles WHERE myusername = '$username' or vis_username = '$username'");
    $sql3 = mysqli_query($conn,"DELETE FROM message WHERE from_user = '$username' or to_user='$username'");
    $sql4 = mysqli_query($conn,"DELETE FROM preferences WHERE username = '$username'");
    $sql5 = mysqli_query($conn,"DELETE FROM block WHERE block_by_user = '$username' or blocked_user='$username'");

    if( $sql2 == TRUE && $sql3 == TRUE && $sql4 == TRUE && $sql5 == TRUE && $sql == TRUE)
    {
        header("location: exit_page.php?username=" . $username) ;
    }
    else{
        header("location: test.php?popup=INV_USER&user_check=" . $username) ;
    }

    ?>