<?php

namespace controller;

use model\UsersManager;


// TODO:créer medel/utilisateur(recup les infos) et utilisateurManager(qui envoit/recup à la base de donnée)

class UsersController extends Controller
{
    protected $userManager;


    public function __construct()
    {
        $this->userManager = new UsersManager();
        parent::__construct();
    }

    public function defaultAction(){}
    

    public function errorAction()
    {
        $data=[];
        $this->render('error', $data);
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

        // var_dump('salut');
        
        $listUsers = $this->userManager ->listUsers();
        var_dump($listUsers);
        $data = [
            'users' => $listUsers
        ];
        $this->render("listUsers", $data);
    }

    public function loginAccessAction()
    {
        $this->user->getUserAction();
    }

}
