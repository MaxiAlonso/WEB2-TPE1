<?php

class SecureController {

    function __construct() {
        if (isset($_SESSION["User"])) {
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) $this->logout();
            $_SESSION['LAST_ACTIVITY'] = time();
        } else {
            header("Location: " .  BASE_URL .  "login");
        }
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: " .  BASE_URL .  "login");
    }

}