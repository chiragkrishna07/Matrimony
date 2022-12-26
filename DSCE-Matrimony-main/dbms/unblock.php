<?php 
    include('config.php');
    session_start();

    $block_by_user = $_POST['username'];
    $blocked_user = $_POST['unblocked_user'];

    $sql1 = "SELECT * FROM block where block_by_user = '$block_by_user' and blocked_user = '$blocked_user' ;";
    $result1 = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result1);

    if($count == 1)
    {
        $sql = "DELETE FROM block where block_by_user = '$block_by_user' and blocked_user = '$blocked_user' ; ";
        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            // echo '<script type="text/javascript">'; 
            // echo 'alert("SUCCESSFULLY UNBLOCKED");'; 
            // echo '</script>';
            header("location: test.php?popup=SUCCESS&user_check=" . $block_by_user);
             
        }
        else{
            echo 'error';
        }
    }
    else{
        // echo '<script type="text/javascript">'; 
        // echo 'alert("INVALID USERNAME");'; 
        // echo '</script>';
        header("location: test.php?popup=INV_USER&user_check=" . $block_by_user);
    }

?>
    