<?php

namespace controller;

class AccueilController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
        
        $data = ['test' => "ça marche"];
        $this->render('accueil', $data);

    }




}