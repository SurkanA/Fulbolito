<?php
require_once 'libs/Smarty/Smarty.class.php';
require_once 'libs/auth.helper.php';

class UserView
{
    private $smarty;

    public function __construct()
    {
        $authHelper = new AuthHelper();
        $admin = $authHelper->isLogged();

        $this->smarty = new Smarty();
        $this->smarty->assign('base', BASE_URL);
        $this->smarty->assign('admin', $admin);
    }

    public function showHome()
    {
        $this->smarty->display('home.tpl');
    }
    public function showLogin()
    {
        $this->smarty->display('login.tpl');
    }

    public function showRegister()
    {
        $this->smarty->display('register.tpl');
    }
}