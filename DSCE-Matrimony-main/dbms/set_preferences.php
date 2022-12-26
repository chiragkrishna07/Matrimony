<?php 
    include('config.php');
    session_start();

    $username = $_GET['username'];

    if(isset($_GET['popup']))
    {
        $popup = $_GET['popup'];
        if($popup == "REGISTERED")
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("SUCCESSFULLY REGISTERED");'; 
            echo '</script>';
        }
    }





?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Set prference</title>
    <link rel="stylesheet" href="styles.css" />

</head>
<body>
<form action="set_preferences_php.php" method = "post">
    <fieldset>
        <h1>Set your Preferences</h1>

        <!--<label>Your username: --><input type="text" name="username" value="<?php echo $username ?>" style="visibility:hidden;" readonly/></label>

        <label>Minimum Age (years): <input type="number" name="pref_lowage" min="18" max="120" /></label>

        <label>Maximum age (years): <input type="number" name="pref_highage" min="18" max="120" /></label>

        <label>Minimum Salary (per annum): <input type="number" name="pref_lowsal"  /></label>

        <label>Place: <input type="text" name="pref_place" style="text-transform:uppercase"   /></label>

        <label>Religion: <input type="text" name="pref_religion" style="text-transform:uppercase"  /></label>

        <label>Expectation from partner:
            <textarea name="pref_expectations" rows="3" cols="30" ></textarea>
        </label>
</fieldset>
<input type="submit" value="Submit" />
</form>
</body>
</html>