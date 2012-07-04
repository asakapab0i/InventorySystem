<?php

/**
 * @desc Organized codes so that the workplace is clean and neat looking
 */
/**
 * @desc Create a new instance of Session and pass the location of the page it is 
 * intended to be. 
 * 
 * Instantiating the SessionCheck and use its function
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
    /**
     * @desc Mysql query to check the database 
     */
    $sql = mysql_query("SELECT * FROM accounts WHERE user='$username' and password ='$password'")
            or die(mysql_error());
    /**
     * @desc Check there is only one result or row queried 
     * 1 == Unique and there is a match
     * 0 == Wrong password
     * result>1 == Database error(Duplicates)
     */
    if (mysql_num_rows($sql) == 1) {
        /**
         * @desc Assigning the sessions from the $username 
         */
        $_SESSION['user'] = $username;
        $_SESSION['SessionTimeOut'] = strtotime("now");

        header('Location: ../Employee/');
    } elseif (empty($username) && empty($password)) {
        /**
         * @desc  Display the error messages when logged in is incorrect
         */
        $value = "Please type your username and password!";
        $error_message = '<span class="error">';
        $error_message .= "$value";
        $error_message.= "</span><br/><br/>";
    } elseif (empty($password) && !empty($username)) {
        $value = "Please enter your password!";
        $error_message = '<span class="error">';
        $error_message .= "$value";
        $error_message.= "</span><br/><br/>";
    } elseif (empty($username) && !empty($password)) {
        $value = "Please enter your username!";
        $error_message = '<span class="error">';
        $error_message .= "$value";
        $error_message.= "</span><br/><br/>";
    }
}
?>
