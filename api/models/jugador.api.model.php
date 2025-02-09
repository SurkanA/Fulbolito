<?php
require_once('model.api.php');

class JugadorApiModel extends ModelApi
{
    public function getJugadores()
    {
        $pDO = $this->createConnection();

        $sql = "select * from jugador";
        $query = $pDO->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugadoresPaginado($limite)
    {
        $pDO = $this->createConnection();

        $sql = "SELECT * FROM `jugador` ORDER BY `jugador`.`id_jugador` DESC LIMIT $limite";
        $query = $pDO->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugadoresOrdenado($categoria, $orden)
    {
        $pDO = $this->createConnection();

        $sql = "SELECT * FROM `jugador` ORDER BY `jugador`.`$categoria` $orden";
        $query = $pDO->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugadoresFiltro($filtro, $valor)
    {
        $pDO = $this->createConnection();
        if ($filtro == 'nombre_equipo') {
            $sql = 'SELECT * FROM jugador WHERE REPLACE(nombre_equipo, " ", "") = REPLACE(?, " ", "")';
        } elseif ($filtro == 'nombre_jugador') {
            $sql = 'SELECT * FROM jugador WHERE REPLACE(nombre_jugador, " ", "") = REPLACE(?, " ", "")';
        } else {
            $sql = "SELECT * FROM `jugador` WHERE $filtro = ?";
        }
        $query = $pDO->prepare($sql);
        $query->execute([$valor]);

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugador($equipo, $id)
    {
        $pDO = $this->createConnection();

        $sql = 'SELECT * FROM jugador
        WHERE REPLACE(nombre_equipo, " ", "") = REPLACE(?, " ", "") AND id_jugador = ?';
        $query = $pDO->prepare($sql);
        $query->execute([$equipo, $id]);

        $jugadores = $query->fetch(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function deleteJugador($equipo, $id)
    {
        $pDO = $this->createConnection();
        $sql = 'DELETE FROM jugador
        WHERE REPLACE(nombre_equipo, " ", "") = REPLACE(?, " ", "") AND id_jugador = ?';
        $query = $pDO->prepare($sql);
        $query->execute([$equipo, $id]);
    }

    public function createPlayer($nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url)
    {
        $pDO = $this->createConnection();
        $sql = 'INSERT INTO jugador (nombre_jugador, nombre_equipo, id_jugador, edad, posicion, biografia, imagen_url) 
        VALUES (?, ?, ?, ?, ?, ?, ?)';
        $query = $pDO->prepare($sql);
        $query->execute([$nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url]);
    }

    public function updatePlayer($nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url, $equipo, $id)
    {
        $pDO = $this->createConnection();
        $sql = 'UPDATE jugador SET nombre_jugador = ?, nombre_equipo = ?, id_jugador = ?, edad = ?, posicion = ?, biografia = ?, imagen_url = ? 
        WHERE REPLACE(nombre_equipo, " ", "") = REPLACE(?, " ", "") AND id_jugador = ?';
        $query = $pDO->prepare($sql);
        $query->execute([$nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url, $equipo, $id]);
    }

    public function teamExist($equipo)
    {
        $pDO = $this->createConnection();
        $sql = 'SELECT * FROM equipo WHERE nombre_equipo = ?';
        $query = $pDO->prepare($sql);
        $query->execute([$equipo]);
        $equipo = $query->fetch(PDO::FETCH_OBJ);
        return $equipo != null;
    }
}