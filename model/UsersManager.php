<?php

namespace model;


use classes\dbConnect;
use model\Users;
use PDO;
use controller\UsersController;
use Users as GlobalUsers;

class UsersManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add()
    {
    }
    public function update(Users $users)
    {
        $cpt = $this
            ->manager
            ->db
            ->prepare('UPDATE SET login=:login FROM users WHERE id=:id ');
        $cpt->execute(
            [
                ':id'      => $users->getId(),
                ':login' => $users->getLogin()
            ]
        );
        $res = $cpt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($res);
        return $res;
    }
    public function remove(Users $users)
    {
        $cpt = $this
            ->manager
            ->db
            ->prepare('DELETE FROM users WHERE id=:id ');
        $cpt->execute(
            [
                ':id'      => $users->getId()
            ]
        );
        $res = $cpt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($res);
        return $res;
    }
    public function listUsers()
    {

        $cpt = $this
            ->manager
            ->db
            ->query('SELECT * FROM users');
        $cpt->execute();
        $res = $cpt->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($res);
        return $res;
    }

    // public function loginAccessAction()
    // {
    //     $users = [];
    //     $q = $this->manager
    //         ->db
    //         ->prepare('SELECT * FROM users');
    //     $q->execute();
    //     $listRes = $q->fetchAll(\PDO::FETCH_ASSOC);
    //     return $listRes;
    // }


    public function loginAccessAction()
    {
        // var_dump($_POST);
        if (isset($_POST['login']) && isset($_POST['password'])) {
            // var_dump($_REQUEST);


            $requete = $this->manager
                ->db
                ->prepare("SELECT * FROM `users` WHERE login=:login AND password=:password ");
            $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
            $requete->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

            $requete->execute();
            $result = $requete->fetchAll(\PDO::FETCH_ASSOC);


            // var_dump($result);
            // $isValid = $this->result; 
            return ($result);
        }
    }
}
