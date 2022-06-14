<?php

namespace controller;

class TeamsListController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {

        $data = [];
        $this->render('teamsList', $data);

    }
    
   

}