<?php
    include('config.php');
    session_start();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    //$password = $_POST['password'];
    
    //$profpic = $_POST['profpic'];
    $age = $_POST['age'];
    $sal = $_POST['sal'];
    $gender = $_POST['gender'];
    $place = $_POST['place'];
    $religion = $_POST['religion'];
    $bio = $_POST['bio'];

    $sql = "UPDATE users set email = '$email', phno = '$phno', age = '$age', sal = '$sal', gender = '$gender', place = '$place', religion = '$religion', bio = '$bio' where username = '$username'; ";
    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        // echo '<script type="text/javascript">'; 
        // echo 'alert("SUCCESSFULLY UPDATED");'; 
        // echo '</script>';
        //$_SESSION['user_login'] = 1;
        header("location: test.php?popup=SUCCESS&user_check=" . $username) ;
    }
    else{
        echo 'query failed';
    }
?>