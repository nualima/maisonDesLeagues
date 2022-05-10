<?php

namespace model;

use model\Stats;

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

    public function updateScoreTable(Stats $stats){
        
        $q = $this
            ->manager
            ->db
            ->prepare('UPDATE SET nb_victoire=:nb_victoire, nb_defaite=:nb_defaite FROM `stats` INNER JOIN `team` ON id = id_team Order by nb_victoire Desc');
        $q->execute([
            ':nb_victoire'      => $stats->getNbVictoire(),
            ':nb_defaite'       => $stats->getNbDefaite()
        ]);
        $res = $q -> fetchAll(\PDO::FETCH_ASSOC);
        return $res;
    }
} 
