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

    public function getUser( $id )
    {
        if( isset( $id ) ) {
            $cpt = $this
                ->manager
                ->db
                ->prepare('SELECT * FROM users WHERE id=:id');
            $cpt->execute([':id'=>$id]);
            $res = $cpt->fetchAll(\PDO::FETCH_ASSOC);
         //var_dump($res);die;
            return new Users( current( $res ) );
        } else return false;
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
            ->exec('DELETE FROM users WHERE id=' . $users->getId());
        return $cpt;
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
        if (isset($_POST['login'])) {

            // var_dump($_REQUEST);


            $requete = $this->manager
                ->db
                ->prepare("SELECT * FROM `users` WHERE login=:login ");
            $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);

            $requete->execute();
            $result = $requete->fetchAll(\PDO::FETCH_ASSOC);


           //var_dump($result);die;
            // $isValid = $this->result; 
            return (current( $result ));
        }
    }
}
