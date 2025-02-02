<?php
require_once('model.api.php');

class UsuarioApiModel extends ModelApi
{
    //Función que pide a la DB un usuario a partir de un user
    public function getUsuario($user)
    {
        $pdo = $this->createConnection();

        $sql = "select * from usuario where user = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$user]);

        $usuario = $query->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }
}