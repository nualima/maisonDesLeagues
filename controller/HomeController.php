<?php

namespace controller;

class HomeController extends Controller
{


    public function __construct()
    {
        //on 
        parent::__construct();

    }


    public function defaultAction()
    {
        
        $data = ['test' => "ça marche"];
        $this->render('home', $data);

    }
    



}