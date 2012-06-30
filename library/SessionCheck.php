<?php

session_start();

/**
 * Description of SessionCheck
 * @desc check if there is already a session 
 * if not then it will redirect to the homepage
 * @author Bryan Bojorque
 */
class SessionCheck {

    public $session;
    public $sql_query;
    private $location;

    /**
     *
     * @param Locate the location of where is the intended
     *  page the CheckSession is triggered.
     */
    public function CheckSession() {
        $this->session = $_SESSION['user'];
        if (!$this->session) {
            // redirect to home page if no session available.
            return TRUE;
            header("Location: ../");
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
            header('Location: ../');
        } else {
            return TRUE;
        }
    }

    /**
     * @desc Check Session in Login Page
     * this make sure that there are no sessions availabe
     * when the user login in. Otherwise it will redirect 
     * to homepage. 
     */
    public function LoginCheckSession() {


        if (isset($_SESSION['user'])) {
            header('Location: ../Employee/');
        }
    }

}

?>
