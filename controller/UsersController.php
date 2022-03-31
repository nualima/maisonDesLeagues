<?php

namespace controller;

use model\UsersManager;
use PDO;
use model\UsersManageranager;

// TODO:créer medel/utilisateur(recup les infos) et utilisateurManager(qui envoit/recup à la base de donnée)

class UsersController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }

    


    public function defaultAction()
    {
        
     
    }


    public function create(){


    }
    public function update(){


    }
    public function delete(){


    }
    public function listUsersAction(){

    $manager = new UsersManager();
    $listUsers = $manager->getAllListUsers();


    var_dump($listUsers);
    $data = [
        'listUsers' => $listUsers
    ];
    $this->render("listUsers", $data);
    

    }   


    public function loginAccessAction()
    {
        var_dump($_REQUEST);
        if (isset($_POST['login']) && isset($_POST['password'])) {

            require './connection_bdd.php';
            $requete = $bdd->prepare("SELECT * FROM `users` WHERE login=:login AND password=:password ");
            $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
            $requete->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        
            $requete->execute();
            $result = $requete->fetchAll(\PDO::FETCH_ASSOC);
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];

            var_dump($result);
        
            if ($result) {
                $this->listUsersAction();
                $date = [
                    "user" => $result
                ]; 
                $this->render(
                    "home", $date
                );

                
            } else {
                // TODO: faire une page error
                // header('Location: ../error.php');
            }
        }
        
    }



}
