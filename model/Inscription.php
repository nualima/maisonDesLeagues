<?php

namespace model;


use classes\dbConnect;
use model\Users;
use PDO;
use controller\UsersController;


class Inscription extends Manager
{

    public function checkIfUserExist(Users $users)
    {
        $q = $this
            ->manager
            ->db
            ->prepare('SELECT COUNT(*) as "Count" FROM `users` WHERE login= ?');
        $q->execute([ $users->getLogin()]);
        $q->bindValue('login', $_POST['login']);
        //var_dump($_POST['login']);
        $result = $q->fetch();
        return $result["Count"] !== "0";        
    }

    public function insertNewUser(Users $users)
    {
        $requete = $this
            ->manager
            ->db->prepare("INSERT INTO users(`id`, `login`, `password`) VALUES('', ?, ? )");

        $res = $requete->execute([$users->getLogin(), $users->getPassword()]);
    }
}
