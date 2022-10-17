<?php
require_once 'app/views/login.view.php';
require_once 'app/models/user.model.php';

class LoginController {

    private $view;
    private $model;

    function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
    }

    function login() {
        $this->view->showLogin();
    }

    function verificarLogin() {
        $user = $_POST['email'];
        $pass = $_POST['password']; 
        $dbUser = $this->model->get($user);
        if (empty($user)) $this->view->showLogin("Ingrese los datos.");
        else {
            if(isset($dbUser) && !empty($dbUser)) {
                if (password_verify($pass,$dbUser[0]->password)) {
                    session_start();
                    $_SESSION["User"] = $user;
                    header('Location: ' . BASE_URL . 'home');
                }
                else $this->view->showLogin("Contraseña incorrecta.");
            }
            else $this->view->showLogin("No existe un usuario con ese email.");
        }
    }


    function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}