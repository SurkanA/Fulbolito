<?php

require_once 'app/models/user.model.php';
require_once 'app/views/user.view.php';
require_once 'helpers/auth.helper.php';

class UserController
{

    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();
    }

    public function showHome()
    {
        $this->view->showHome();
    }
    public function login()
    {
        $this->view->showLogin();
    }

    public function logout()
    {
        $this->authHelper->logout();
        header('Location: ' . BASE_URL . 'login');
    }


    public function register()
    {
        $this->view->showRegister();
    }

    public function addUser()
    {
        if ($_POST['user'] != "" && $_POST['password'] != "") {
            $user = $_POST['user'];
            $userPassword = $_POST['password'];

            $hash = password_hash($userPassword, PASSWORD_DEFAULT);

            $user = $this->model->createUser($user, $hash, 'N');
            header('Location: ' . BASE_URL . 'login');
        }
    }

    public function authUser()
    {
        $user = $_REQUEST['user'];
        $password = $_REQUEST['password'];

        $user = $this->model->getUser($user);

        //Si el usuario existe y las contraseñas coinciden
        if (!empty($user) && password_verify($password, ($user->password))) {
            $this->authHelper->login($user);

            header('Location: ' . BASE_URL . 'home');
        } else {
            header('Location: ' . BASE_URL . 'login');
        }
    }
}