<?php

namespace controller;

use model\UsersManager;


class ErrorController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
    
        $data=[];
        $this->render('error', $data);
    }





}