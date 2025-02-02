<?php
require_once 'libs/Smarty/Smarty.class.php';

class TeamView
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

    public function showTeam($team)
    {
        $this->smarty->assign('team', $team);
        $this->smarty->display('team.tpl');
    }
    public function showTeams($teams)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->display('teams.tpl');
    }

    public function showModTeam($teams)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->display('modPlayer.tpl');
    }
    public function editTeam($teams)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->display('modPlayer.tpl');
    }

    public function mostrarFormEditarTeam($team)
    {
        $this->smarty->assign('team', $team);
        $this->smarty->display('forEditteam.tpl');
    }

    public function showForm($admin)
    {
        $this->smarty->assign('isLogged', $admin);
        $this->smarty->display('insertteam.tpl');
    }
}