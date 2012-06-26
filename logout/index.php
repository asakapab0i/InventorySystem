<?php

session_start();
/**
 * @desc LOGOUT INDEX PAGE~!
 */

/**
 * Logout class, Object Oriented Style!
 *
 * @author Bryan Bojorque
 */
class Logout {

    private $session;

    public function __construct() {
        $this->redirectHome();
    }

    /**
     *
     * @return boolean  
     * @desc if TRUE then will execute the redirectHome as TRUE
     *  
     */
    public function isLoggedin() {
        $this->session = $_SESSION['username'];

        if ($this->session) {
            return TRUE;
        } else {
            echo 'You should not see this.';
            //header('Location: ../');
        }
    }

    /**
     * @desc Executes the session_destroy if isLoggedin returns true.
     *  
     */
    public function redirectHome() {

        if ($this->isLoggedin() == TRUE) {

            session_destroy();
            header('Location: ../');
        } else {
            echo 'You are not allowed to view this!';
        }
    }

}

$Logout = new Logout();
?>
