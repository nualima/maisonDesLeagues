<?php

namespace model;


class ScoreTableModel extends Manager
{

    public function getScoreTable()
    {
        $q = $this
            ->manager
            ->db
            ->prepare('SELECT * FROM `stats` INNER JOIN `team` ON id = id_team Order by nb_victoire Desc');
        $q->execute();
        $res = $q -> fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($res);
        return $res;
    }

    public function updateScoreTable(){
        $q = $this
            ->manager
            ->db
            ->prepare('UPDATE `nb_victoire` AND `nb_defaite` FROM `stats` INNER JOIN `team` ON id = id_team Order by nb_victoire Desc');
        $q->execute();
        $res = $q -> fetchAll(\PDO::FETCH_ASSOC);
        return $res;
    }
} 
