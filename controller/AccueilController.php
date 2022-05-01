<?php

namespace controller;

use model\UsersManager;


class AccueilController extends Controller
{


    public function __construct()
    {
        $this->userManager = new UsersManager();

        parent::__construct();
    }


    public function defaultAction()
    {
        
        $isValid = $this->userManager
            ->loginAccessAction();
        $data = [
            'users' => current($isValid)
        ];

        if ($isValid) {
            // var_dump($isValid);

            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            // $this->listUsers();
            $this->render('home', $data);
            // $this->defaultAction();
        } else {
            $this->render('error', $data);
            // TODO: faire une page error
            // header('Location: ../error.php');
        }
    }
    public function disconnectAction()
    {

        session_destroy();

        
        $data = ['test' => "ça marche"];
        $this->render('home', $data);
        
    }
    public function homeBack()
    {

        
        $data = [];
        $this->render('home', $data);
        
    }

 
}
