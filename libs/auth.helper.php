<?php

class AuthHelper
{
    public function __construct()
    {
    }

    public function login($user)
    {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id_user;
        $_SESSION['USER'] = $user->user;
        $_SESSION['ADMINISTRATOR'] = $user->administrator;

    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'loginUser');
            die();
        }
    }

    public function isLogged()
    {
        session_start();
        if (isset($_SESSION['ADMINISTRATOR'])) {
            return $_SESSION['ADMINISTRATOR'];
        }
    }

    public function isAdmin()
    {
        session_start();
        if (isset($_SESSION['ADMINISTRATOR']) && $_SESSION['ADMINISTRATOR'] == "S") {
            return true;
        } else {
            return false;
        }
    }
}