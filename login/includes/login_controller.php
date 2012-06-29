<?php

/**
 * @desc Organized codes so that the workplace is clean and neat looking
 */
/**
 * @desc Create a new instance of Session and pass the location of the page it is 
 * intended to be. 
 * 
 * Instantiating the SessionCheck and used its function
 */
$CheckLogin = new SessionCheck();
$CheckLogin->LoginCheckSession();



$error_message = '';


if (isset($_POST['submit'])) {
    /**
     * @desc username and password get data from form
     */
    $username = $_POST['username'];
    $password = $_POST['password'];


    /**
     * @desc to protect from SQL Injection see library/datacleansing.php
     */
    $username = $CleanData->StripAndEscape($username);
    $password = $CleanData->StripAndEscape($password);


    $sql = mysql_query("SELECT * FROM accounts WHERE user='$username' and password ='$password'")
            or die(mysql_error());

    if (mysql_num_rows($sql) == 1) {

        /**
         * @desc Assigning the sessions from the $username 
         */
        $_SESSION['user'] = $username;

        header('Location: ../Employee/');
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
