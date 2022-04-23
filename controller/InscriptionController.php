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

        // $q = $this->inscripton->inscriptionAction();
        // var_dump($q);
        // $insert = $this->inscription->userInsertAction();

        // $data = [
        //     'users' => current($q)
        // ];
        if (isset($_POST['login']) && $_POST['login'] !== '') {

            // var_dump($q);
            $data = [

                'login' => $_POST['login'],
                'password' => $_POST['password']

            ];
            $users = new Users($data);
            var_dump($users);
            $inscription = new Inscription();
            //si aucune ligne ne remonte 
            $q = $inscription->inscriptionAction($users);
            var_dump($q);


            if ($q == 1) {
                $insterUser = $inscription->userInsertAction($users);
                $data = [];
                $this->render('accueil', $data);
            } else {
                $this->render('error', $data);
            }
        }
        // if ($q) {
        //     var_dump($q);
        //     if ($q->fetchColumn() == 0) {
        //         $this->$insert;
        //         $_SESSION['pseudo'] = $_POST['identifiant'];
        //         $this->render('accueil', $data);
        //     } else {
        //         $this->render('error', $data);
        //     }
        // }
    }
}
