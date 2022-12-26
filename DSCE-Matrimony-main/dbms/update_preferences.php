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

    $sql = "UPDATE preferences SET pref_lowsal = '$pref_lowsal', pref_lowage = '$pref_lowage', pref_highage = '$pref_highage', pref_place = '$pref_place', pref_religion = '$pref_religion', pref_expectations = '$pref_expectations' ; ";
    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("SUCCESSFULLY UPDATED");'; 
        echo '</script>';
        header("location: myprofile.php?popup=SUCCESS&username=" . $username) ;
    }
    else{
        echo 'query failed';
    }






?>
