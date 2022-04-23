<?php

namespace model;


use classes\dbConnect;
use model\Users;
use PDO;
use controller\UsersController;


class Inscription extends Manager
{

    public function inscriptionAction(Users $users)
    {
        $q = $this
            ->manager
            ->db
            ->prepare('SELECT * FROM `users` WHERE login=:login');
        $q->bindValue('login', $users->getLogin());
        $conteur= $q->rowCount();
        return $conteur;
        
    }
    public function userInsertAction(Users $users)
    {
        $requete = $this
            ->manager
            ->db->prepare("INSERT INTO users(`id`, `login`, `password`) VALUES('', :login, :pass)");
        $requete->bindParam(':login', $users->getLogin(), PDO::PARAM_STR);
        $requete->bindParam(':pass', $users->getPassword(), PDO::PARAM_STR);
        $res = $requete->execute();
    }
}
