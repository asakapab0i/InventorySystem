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
        $this->isLoggedin();
    }

    /**
     *
     * @return boolean  
     * @desc if TRUE then will execute the following.
     *  
     */
    public function isLoggedin() {
        $this->session = $_SESSION['user'];

        if ($this->session) {
            session_destroy();
            session_unregister($this->session);
            session_unset();

            header('Location: ../');
        } else {
            echo 'You should not see this.';
            header('Location: ../');
        }
    }

    /**
     * @desc Executes the session_destroy if isLoggedin returns true.
     *  
     */
}

$Logout = new Logout();
?>
