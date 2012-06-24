<?php

/**
 *@desc Organized codes so that the workplace is clean and neat looking
 */

$error_message = '';

if (isset($_SESSION['user'])) {
    header('Location: ../Employee/');
}


if (isset($_POST['submit'])) {
    /**
     * @desc username and password get data from form
     */
    $username = $_POST['username'];
    $password = $_POST['password'];


    /**
     * @desc to protect from SQL Injection see library/datacleansing.php
     */
    $username = $cleanse->StripAndEscape($username);
    $password = $cleanse->StripAndEscape($password);


    $sql = mysql_query("SELECT * FROM accounts WHERE user='$username' and password ='$password'")
            or die(mysql_error());

    if (mysql_num_rows($sql) == 1) {

        $_SESSION['user'] = $_POST['user'];

        header("Location: ../Employee/");
    } else {
        /**
         * @desc  Display the error messages when logged in is incorrect
         */
        $value = "Wrong Username or Password!";
        $error_message = '<span class="error">';
        $error_message .= "$value";
        $error_message.= "</span><br/><br/>";
    }
}
?>
