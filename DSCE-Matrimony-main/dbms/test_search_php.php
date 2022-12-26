<?php 
    include('config.php');
    session_start();

    $username = $_POST['username'];


    $vis_user = $_POST['vis_user'];

    $sql3 = mysqli_query($conn,"SELECT * FROM block where block_by_user='$vis_user' and blocked_user = '$username'");
    $nrows = mysqli_num_rows($sql3);
    // if($nrows != 0)
    // {
    //     header("location: test.php?popup=INV_USER&user_check=" . $username) ;
    // }

    $sql = mysqli_query($conn,"SELECT * FROM users where username = '$vis_user'");
    $sql1 = mysqli_query($conn,"SELECT * FROM users where username = '$username'");

    $row = mysqli_fetch_assoc($sql);
    $row1 = mysqli_fetch_assoc($sql1);

    $isexist = mysqli_num_rows($sql);

    if($isexist != 0 && $nrows==0)
    {
        if( $vis_user == $username)
        {
            header("location: myprofile.php?username=".$username); // go to myprofile
        }
        else if($row['gender'] == $row1['gender'])
        {
             
            header("location: test.php?popup=SAME_GENDER&user_check=" . $username) ;
        }
        else{
            //header("location: profile.php?username=".$username."&vis_user=".$vis_user) ;
            header("location: profile.php?vis_user=".$vis_user."&username=".$username) ;
        }
        
    }
    else{
         
        header("location: test.php?popup=INV_USER&user_check=" . $username) ;
             
     }

?>

