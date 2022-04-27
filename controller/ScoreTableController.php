<?php

namespace controller;

use model\ScoreTableModel;


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
    public function updateStat()
    {

        $data = $this->ScoreTableModel
                    ->updateScoreTable();
        $this->render('scoreTable', ['stats' => $data]);  

    }
}
