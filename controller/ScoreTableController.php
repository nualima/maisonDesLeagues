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
    
    public function updateStatsAction()
    {

//        var_dump((int)$_POST['nbVictoire']);

        if
        (isset($_POST['nbVictoire']) && isset($_POST['nbDefaite']))

        $data = [
            'idTeam'            => $_POST['idTeam'],
            'idSaison'          => $_POST['idSaison'],
            'NbVictoire'       =>$_POST['nbVictoire'],
            'NbDefaite'        =>$_POST['nbDefaite']
        ];
        $stats = new Stats($data);
//        var_dump( $stats ); die;
        if( $this->ScoreTableModel
            ->updateScoreTable($stats) ) {
            $data = $this->ScoreTableModel
                        ->getScoreTable();
            $this->render('scoreTable', ['stats' => $data]);
        }
        
        //$this->render('scoreTable', $data);  

    }
}
