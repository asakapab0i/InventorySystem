<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SessionTimeOut
 * @desc logout user when he/she becomes inactive for a certain amount of time.
 * @author Bryan
 */
class SessionTimeOut {

    public $logLength;
    public $ctime;
    public $sessionstart;

    public function __construct() {
        $this->SessionActivity();
    }

    public function CheckSession() {
        $this->session = $_SESSION['user'];
        if (!$this->session) {
            // redirect to home page if no session available.
            return TRUE;
            //header("Location: ../");
        } else {
            //Do nothing here, there is a session.
        }
    }

    public function CheckUser() {
        $this->sql_query = mysql_query("SELECT id FROM accounts WHERE '$this->session' = user")
                or die(mysql_error());

        if (mysql_num_rows($this->sql_query) != 1) {
            /**
             * @desc if this triggers then it means that there is 
             * no user that matched in the database 
             * it will redirect to homepage
             */
            return TRUE;
            //header('Location: ../');
        } else {
            
        }
    }

    public function SessionActivity() {
        $this->logLength = 1;
        $this->ctime = strtotime("now");
        $this->sessionstart = $_SESSION['SessionTimeOut'];

        if (!isset($this->sessionstart)) {

            $this->sessionstart = $this->ctime;
        } else {

            if (((strtotime("now") - $this->sessionstart) > $this->logLength)
                    && ($this->CheckSession() && $this->CheckUser()) == TRUE) {
                header('Location: ../Logout/');
                exit;
            } else {
                $sessionstart = $this->ctime;
            }
        }
    }

}

$sessionActivity = new SessionTimeOut();
?>
