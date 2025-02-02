<?php
require_once 'libs/Smarty/Smarty.class.php';

class PlayerView
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

    public function showPlayers($players, $teams)
    {
        $this->smarty->assign('players', $players);
        $this->smarty->assign('teams', $teams);
        $this->smarty->display('players.tpl');
    }

    public function showPlayer($player)
    {
        $this->smarty->assign('player', $player);
        $this->smarty->display('player.tpl');
    }

    public function showModPlayer($player, $equipos)
    {
        $this->smarty->assign('player', $player);
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('modifyPlayer.tpl');
    }
}