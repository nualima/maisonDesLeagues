<?php

namespace controller;

use mmodel\Users as MmodelUsers;
use model\Users;
use model\Inscription;

class InscriptionController extends Controller
{


    public function __construct()
    {

        $this->inscription = new Inscription();

        parent::__construct();
    }


    public function defaultAction()
    {

        if (isset($_POST['login']) && $_POST['login'] !== '') {

            // var_dump($q);
            $data = [

                'login' => $_POST['login'],
                'password' => $_POST['password']
            ];

            $users = new Users($data);
            $inscription = new Inscription();
            //si aucune ligne ne remonte 
            $userAlreadyExist = $inscription->checkIfUserExist($users);
            // renvoie par exemple :
            // object(model\Users)#14 (2) { ["_login"]=> string(3) "aze" ["_password"]=> string(3) "zae" } int(0)


            if ($userAlreadyExist === false) {
                $insterUser = $inscription->insertNewUser($users);
                $data = [];
                $this->render('accueil', $data);
            } else {
                $this->render('error', $data);
            }
        }
    }
}
