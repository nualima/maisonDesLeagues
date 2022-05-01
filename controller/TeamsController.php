<?php

namespace controller;

class TeamsController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
        
        $data = [];
        $this->render("teams", $data);

    }
    
   

}