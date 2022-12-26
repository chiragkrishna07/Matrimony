<?php
    $username = $_GET['username'];
    ?>

<!DOCTYPE html>
<head>
    <title>Thank you</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>GOOD BYE <?php echo $username ?>!</h1>
    <h4>Thank you for being a valued member of DSCE Matrimony. We hope we played an instrumental role in helping you find your better half. 
    If you were satisfied with our service, please let your yet to be married friends know about our wonderful website. We hope we are invited 
    to your wedding. Before leaving us, we ask one last favour from you, please provide an honest feedback about your experience on DSCE matrimony 
    whch will help us provide better service to your friends.</h4>
    <form action="feedback.php" method="post">
        <fieldset> 
            <!--<label>Your username:--> <input type="text" name="username"  value = "<?php echo $row['username'] ?>" style="visibility:hidden;" readonly /></label>
        <label>FEEDBACK
          <textarea name="feedback" rows="3" cols="30" placeholder="DSCE Matrimony rocks..." required></textarea>
        </label>
            <input type="submit" value="SUBMIT"/>
                </fieldset>
                </form>
