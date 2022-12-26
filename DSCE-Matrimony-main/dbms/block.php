<?php 
    include('config.php');
    session_start();

    $block_by_user = $_POST['username'];
    $blocked_user = $_POST['blocked_user'];

    if($block_by_user == $blocked_user)
    {
        header("location: test.php?popup=INV_USER&user_check=" . $block_by_user) ;
    }

    $sql3 = mysqli_query($conn,"SELECT * FROM users where username = '$blocked_user'");
    $row3 = mysqli_fetch_assoc($sql3);
    $isexist = mysqli_num_rows($sql3);

    if($isexist != 0)
    {


    $sql = "INSERT INTO block VALUES('$block_by_user','$blocked_user') ; ";
    $result = mysqli_query($conn, $sql);

    if($result==true)
    {
        $sql1 = "DELETE FROM bookmarked_profiles where myusername = '$block_by_user' and vis_username = '$blocked_user';";
        $result1 = mysqli_query($conn,$sql1);

        if($result1!=true)
        {
            echo 'bookmark delete failed';
        }

        $sql2 = "DELETE FROM message where from_user = '$block_by_user' and to_user = '$blocked_user';";
        $result2 = mysqli_query($conn,$sql2);


        if($result2!=true)
        {
            echo 'message delete failed';
        }

         
        header("location: test.php?popup=SUCCESS&user_check=" . $block_by_user) ;

    }
}
    else{
        header("location: test.php?popup=INV_USER&user_check=" . $block_by_user) ;
    }

    ?>