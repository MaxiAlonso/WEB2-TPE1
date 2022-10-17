<?php

class LoginView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($msg = '') {
        $titulo = "Coffee Shop | Login";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/login.tpl');
    }
}