<?php
    include('config.php');
  
    session_start();

    //if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['profpic']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['place']) && isset($_POST['religion']) && isset($_POST['bio']) )
    //{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        //$profpic = $_POST['profpic'];
        $age = $_POST['age'];
        $sal = $_POST['sal'];
        $gender = $_POST['gender'];
        $place = $_POST['place'];
        $religion = $_POST['religion'];
        $bio = $_POST['bio'];


        // $status = 'error'; 
        // if(!empty($_FILES['image']['name'])) { 
        // // Get file info 
        // $fileName = basename($_FILES['image']['name']); 
        // $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // // Allow certain file formats 
        // $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($fileType, $allowTypes)){ 
        //     $image = $_FILES['image']['tmp_name']; 
        //     $imgContent = addslashes(file_get_contents($image)); 
        


        $sql1 = mysqli_query($conn,"SELECT * FROM users where username = '$username'; ");
        $count = mysqli_num_rows($sql1);
        if($count!=0)
        {
            header("location: index.php?popup=DUP_USERNAME");
            
            
        }

        $sql2 = mysqli_query($conn,"SELECT * FROM users where email = '$email'; ");
        $count2 = mysqli_num_rows($sql2);
        if($count2!=0)
        {
            header("location: index.php?popup=DUP_EMAIL");
            
            
        }


        $target = "uploads/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];





        //include_once 'config.php';
        $sql = "INSERT INTO users VALUES('$username','$email','$phno','$password','$name','$image','$age','$sal','$gender','$place','$religion','$bio'); ";
        $result = mysqli_query($conn, $sql);

        if($result == true && move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
            
            
            $_SESSION['user_login'] = 1;
            header("location: set_preferences.php?popup=REGISTERED&username=" . $username);
             
            
            
        }
        else{
         echo 'query failed or problem uploading the image';
        }//}
//     else{
//         echo 'only jpg files';
//     }
// }
// else{
//     echo 'select img to upload';
//     echo $_FILES['image']['name'];
// }
    //}
    // else{
    //     echo 'isset failed';
    // }
   

    

?>