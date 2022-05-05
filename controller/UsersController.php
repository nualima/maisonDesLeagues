<?php

namespace controller;

use model\UsersManager;
use model\Users;

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
    public function updateAction()
    {
        if (isset($_REQUEST['id'])) {
            $data=[
                'id'    =>$_REQUEST['id'],
                'login' =>$_REQUEST['login']
            ];
            $user = new Users($data);
            // var_dump($user);
            $this->userManager ->update($user);
            $this->listUsersAction();
            }
            else{
                var_dump("ça n'a pas marché");
            }
    }
    public function deleteAction()
    {

        if (isset($_REQUEST['id'])) {
        $data=[
            'id'    =>$_REQUEST['id'],
        ];
        $user = new Users($data);
        // var_dump($user);
        $this->userManager ->remove($user);
        $this->listUsersAction();
        }
        else{
            var_dump("ça n'a pas marché");
        }
        
        
        

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
