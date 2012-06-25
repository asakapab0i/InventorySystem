<?php

session_start();
/**
 * @desc EMPLOYEE INDEX PAGE~!
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
     * @return boolean  if TRUE then will execute the redirectHome as TRUE
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
        }
    }

}

$Logout = new Logout();
?>
