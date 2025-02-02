<?php
require_once('model.php');

class UserModel extends Model
{

    public function getUser($user)
    {
        $pdo = $this->createConnection();

        $sql = "select * from users where user = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$user]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function createUser($user, $hash, $administrator)
    {
        $pDO = $this->createConnection();

        $sql = 'INSERT INTO users (id_user, user, password, administrator) 
                VALUES (NULL, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$user, $hash, $administrator]);
        } catch (\Throwable $th) {
            return null;
        }
    }
}