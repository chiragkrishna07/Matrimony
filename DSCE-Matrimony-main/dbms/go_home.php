<?php 
    include('config.php');
    session_start();

    $username = $_POST['gousername'];

    header("location: test.php?user_check=".$username) ;

    ?>