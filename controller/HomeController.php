<?php

namespace controller;

class HomeController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
        
        $data = ['test' => "ça marche"];
        $this->render('home', $data);

    }
    
    public function inscriptionAction()
    {
        $data = [];
        $this->render('inscription', $data);
    }

    public function connectionAction()
    {
        $data= [];
        $this->render('connection', $data);
    }


}