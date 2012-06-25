<?php
session_start();
include '../connections/connection.php';
include '../includes/header.php';
include '../includes/footer.php';
include_once '../library/datacleansing.php';

$error_message = '';

if (isset($_SESSION['user'])) {
    header('Location: ../Employee/');
}


if (isset($_POST['submit'])) {
//username and password get data from form
    $username = $_POST['username'];
    $password = $_POST['password'];


//to protect from SQL Injection see library/datacleansing.php
    $username = $cleanse->StripAndEscape($username);
    $password = $cleanse->StripAndEscape($password);


    $sql = mysql_query("SELECT * FROM accounts WHERE user='$username' and password ='$password'")
            or die(mysql_error());

    if (mysql_num_rows($sql) == 1) {

        $_SESSION['user'] = $_POST['user'];

        header("Location: ../Employee/");
    } else {
// display the error message
        $value = "Wrong Username or Password!";
        $error_message = '<span class="error">';
        $error_message .= "$value";
        $error_message.= "</span><br/><br/>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="assets/css/forms.css">
        <link rel="stylesheet" href="assets/css/minibutton.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <script type="text/javascript" src="../assets/js/date_time.js"></script>
        <title>Account Login</title>
    </head>
    <body>
        <div id = "wrapper">
            <header id="main_header">
                <div id="rightAlign">
                    <?php
                    mainHeader();
                    ?>
                </div>
                <a href="index.php"><img src="../assets/images/mainLogo2.png"></a>
            </header>
            <div id="main_section">

                <h3><a href="../" class="minibutton">Back</a></h3>
                <br/><br/><br/>
                <form id="generalform" class="container" method="post" action="">
                    <h3>Login</h3><br/>
                    <?php
                    echo $error_message;
                    ?>
                    <div class="field">
                        <label for="username">
                            <div align="center">Username:</div>
                        </label>
                        <input type="text" class="input" id="username" name="username" maxlength="20"/>
                    </div>
                    <div class="field">
                        <label for="password">
                            <div align="center">Password:</div>
                        </label>
                        <input type="password" class="input" id="password" name="password" maxlength="20"/>

                    </div>

                    <br/>
                    <input type="submit" name="submit" id="submit" class="minibutton2" value="Submit"/>
                </form>

                <br/><br/><h4 id="rightAlign2" class="minibutton"><a href="#" >Click here for Admin Access</a></h4>
                <h4 id="rightAlign2" class="minibutton"><a href="register.php" >Click here to register employee</a></h4>

            </div>



            <div id="main_footer" class="links">
                <?php mainFooter(); ?>
            </div>



        </div>
    </body>
</html>
