<?php

namespace controller;

use model\UsersManager;
use PDO;


// TODO:créer medel/utilisateur(recup les infos) et utilisateurManager(qui envoit/recup à la base de donnée)

class UsersController extends Controller
{

    protected $UsersManager;

    public function __construct()
    {
        $this->UsersManager = new UsersManager();
        parent::__construct();
    }




    public function defaultAction()
    {
    }


    public function create()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function listUsersAction()
    {


        $listUsers = $this->UsersManager->getAllListUsers();



        $data = [
            'listUsers' => $listUsers
        ];
        $this->render("listUsers", $data);
    }


    public function loginAccessAction()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {

            $result = $this->UsersManager->userLogin();
            if ($result) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];




                $this->listUsersAction();
                $data = [
                    "user" => $result
                ];
                $this->render(
                    "home",
                    $data
                );
            } else {
                // TODO: faire une page error
                // header('Location: ../error.php');
            }
        }
    }
}
