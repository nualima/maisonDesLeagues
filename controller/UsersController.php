<?php

namespace controller;

use model\UsersManager;
use PDO;

// TODO:créer medel/utilisateur(recup les infos) et utilisateurManager(qui envoit/recup à la base de donnée)

class UsersController extends Controller
{
    protected $userManager;


    public function __construct()
    {
        $this->userManager = new UsersManager();
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
    public function listUsers()
    {

        $manager = new UsersManager();
        $listUsers = $this->userManager ->getAllListUsersAction();
        var_dump($listUsers);
        $data = [
            'listUsers' => $listUsers
        ];
        $this->render("listUsers", $data);
    }
    public function loginAccessAction()
    {
        $this->userManager->getUserAction();
    }

}
