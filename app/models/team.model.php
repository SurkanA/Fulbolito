<?php
require_once('model.php');

class TeamModel extends Model
{
    //Función que pide a la DB todos los equipos
    public function getTeams()
    {
        $pdo = $this->createConnection();

        $sql = "select * from teams";
        $query = $pdo->prepare($sql);
        $query->execute();

        $teams = $query->fetchAll(PDO::FETCH_OBJ);
        return $teams;
    }

    //Función que trae un equipo por id
    public function getTeam($id_team)
    {
        $pdo = $this->createConnection();

        $sql = "SELECT * FROM teams
        WHERE id_team = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_team]);

        $team = $query->fetch(PDO::FETCH_OBJ);

        return $team;
    }

        public function deleteTeam($id_team)
    {
        $pDO = $this->createConnection();

        $sql = 'DELETE FROM players
                WHERE team_name = (SELECT team_name FROM teams WHERE id_team = ?)';

        $sql2 = 'DELETE FROM teams
                WHERE id_team = ?';

        $query = $pDO->prepare($sql);
        $query2 = $pDO->prepare($sql2);
        try {
            $query->execute([$id_team]);
            $query2->execute([$id_team]);
        } catch (\Throwable $th) {
            return null;
        }

    }

    public function updateTeam($team_name, $city, $year_founded, $biography, $image_url, $id_team)
    {
        $sql = 'UPDATE teams
                    SET team_name = ?, city = ?, year_founded = ?, biography = ?, image_url = ?
                    WHERE id_team = ?';

        $query = $this->createConnection()->prepare($sql);
        $query->execute([$team_name, $city, $year_founded, $biography, $image_url, $id_team]);

    }

    public function createTeam($team_name, $city, $year_founded, $biography, $image_url)
    {
        $pDO = $this->createConnection($team_name, $city, $year_founded, $biography, $image_url);

        $sql = 'INSERT INTO teams (team_name, city, year_founded, biography, image_url) 
                VALUES (?, ?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$team_name, $city, $year_founded, $biography, $image_url]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
        }
    }

}