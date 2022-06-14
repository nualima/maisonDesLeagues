<?php

namespace controller;

class ScoreTableController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
        
        $data = [];
        $this->render('scoreTable', $data);

    }
    

}