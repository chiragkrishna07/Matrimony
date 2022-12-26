<?php
    include('config.php');
    session_start();

    $username = $_POST['username'];

    $target = "uploads/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    

    $sql = "UPDATE users set profpic = '$image' where username = '$username'; ";
    $result = mysqli_query($conn, $sql);

    if($result == true && move_uploaded_file($_FILES['image']['tmp_name'],$target))
    {
        // echo '<script type="text/javascript">'; 
        // echo 'alert("SUCCESSFULLY UPDATED");'; 
        // echo '</script>';
        // //$_SESSION['user_login'] = 1;
        header("location: test.php?popup=SUCCESS&user_check=" . $username) ;
    }
    else{
        echo 'query failed';
    }
?>