<?php

namespace model;


use classes\dbConnect;
use model\users;
use PDO;


class UsersManager extends Manager
{
    public function add()
    {
    }
    public function update()
    {
    }
    public function remove()
    {
    }
    public function listUsers()
    {

        $cpt = $this->manager
            ->db
            ->query('SELECT COUNT(*) FROM users')->fetchColumn();
        return $cpt;
    }

    public function getAllListUsersAction()
    {
        $users = [];
        $q = $this->manager
            ->db
            ->prepare('SELECT * FROM users');
        $q->execute();
        $listRes = $q->fetchAll(\PDO::FETCH_ASSOC);
        return $listRes;
    }
    public function getUserAction()
    {
        var_dump($_REQUEST);
        if (isset($_POST['login']) && isset($_POST['password'])) {


            $requete = $this->manager
                ->db
                ->prepare("SELECT * FROM `users` WHERE login=:login AND password=:password ");
            $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
            $requete->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

            $requete->execute();
            $result = $requete->fetchAll(\PDO::FETCH_ASSOC);
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];

            var_dump($result);

            if ($result) {
                $this->listUsers();
            } else {
                // TODO: faire une page error
                // header('Location: ../error.php');
            }
        }
    }
}
