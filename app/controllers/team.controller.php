<?php

require_once 'app/models/team.model.php';
require_once 'app/views/team.view.php';
require_once 'helpers/auth.helper.php';

class TeamController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new TeamModel();
        $this->view = new TeamView();
        $this->authHelper = new AuthHelper();
    }

    public function showTeams()
    {
        $teams = $this->model->getTeams();
        $this->view->showTeams($teams);
    }
    public function showTeam($id_team)
    {
        $team = $this->model->getTeam($id_team);
        $this->view->showTeam($team);
    }
    public function deleteTeam($id_team)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $this->model->deleteTeam($id_team);
            header('Location: ' . BASE_URL . 'teams');
        }
    }

    public function updateTeam()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $id_team= $_REQUEST['id_team'];
            $team_name = $_REQUEST['team_name'];
            $city = $_REQUEST['city'];
            $year_founded = $_REQUEST['year_founded'];
            $biography = $_REQUEST['biography'] ?: "No biography was introduced.";
            $image_url = $_REQUEST['image_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";

            $this->model->updateTeam($id_team, $team_name, $city, $year_founded, $biography, $image_url);
            header('Location: ' . BASE_URL . 'teams');
        }
    }

    public function editTeam($id_team)
    {
        $team = $this->model->getTeam($id_team);
        $this->view->mostrarFormEditarEquipo($team);
    }
    
    public function createTeam()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $team_name = $_REQUEST['team_name'];
            $city = $_REQUEST['city'];
            $year_founded = $_REQUEST['year_founded'];
            $biography = $_REQUEST['biography'] ?: "No biography was introduced.";
            $image_url = $_REQUEST['image_url'] ?: "https://cdn-icons-png.freepik.com/512/13923/13923540.png";

            $this->model->createTeam($team_name, $city, $year_founded, $biography, $image_url);
            header('Location: ' . BASE_URL . 'teams');
        }
    }

    public function showForm()
    {
        $admin = $this->authHelper->isAdmin();

        $this->view->showForm($admin);
    }
}