<?php

namespace model;


class ScoreTableModel extends Manager
{

    public function getScoreTable()
    {
        $q = $this
            ->manager
            ->db
            ->prepare('SELECT * FROM `stats` INNER JOIN `team` ON id = id_team ');
        $q->execute();
        $res = $q -> fetchAll(\PDO::FETCH_ASSOC);
        var_dump($res);
        return $res;
    }
}
