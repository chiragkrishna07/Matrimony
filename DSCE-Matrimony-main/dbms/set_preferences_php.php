<?php 
    include('config.php');
    session_start();

    $username = $_POST['username'];

    $pref_lowsal = $_POST['pref_lowsal'];
    $pref_lowage = $_POST['pref_lowage'];
    $pref_highage =  $_POST['pref_highage'];
    $pref_place =  $_POST['pref_place'];
    $pref_religion =  $_POST['pref_religion'];
    $pref_expectations =  $_POST['pref_expectations']; 

    $sql = "INSERT INTO preferences VALUES('$username','$pref_lowsal','$pref_lowage','$pref_highage','$pref_place','$pref_religion','$pref_expectations'); ";
    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        
        header("location: test.php?popup=PREFSET&user_check=" . $username) ;
    }
    else{
        echo 'query failed';
    }






?>


