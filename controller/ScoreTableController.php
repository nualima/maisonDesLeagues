<?php

namespace controller;

use model\ScoreTableModel;
use model\Stats;

class ScoreTableController extends Controller
{


    public function __construct()
    {
        $this->ScoreTableModel = new ScoreTableModel();


        parent::__construct();
    }


    public function defaultAction()
    {
        $data = $this->ScoreTableModel
            ->getScoreTable();

        $this->render('scoreTable', ['stats' => $data]);


    }
    
    public function updateStats()
    {
        var_dump($_POST);
        if
        (isset($_POST['nbVictoire']) && isset($_POST['nbDefaite']))

        $data = [
            'nb_victoire'       =>$_POST['nbVictoire'],
            'nb_defaite'        =>$_POST['nbDefaite']
        ];
        $stats = new Stats($data);
        $this->ScoreTableModel
                    ->updateScoreTable($stats);
        $data=[];
        $this->render('scoreTable', $data);  

    }
}
