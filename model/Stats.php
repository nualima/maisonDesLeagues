<?php

namespace model;

class Stats 
{
    private $_id_team,
            $_id_saison,
            $_nb_victoire,
            $_nb_defaite;
    
    public function __construct(array $donnees)
    {
      $this->hydrate($donnees);
    }
    
public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  //GETTER

  public function getIdTeam()
  {
      return $this->_id_team;
  }
  public function getIdSaison(){

    return $this->_id_saison;
  }
  public function getNbVictoire(){

    return $this->_nb_victoire;
  }
  public function getNbDefaite(){

    return $this->_nb_defaite;
  }

 // SETTER 

 public function setIdTeam($id_team)
 {
  if (is_string($id_team))
  {
    $this->_id_team = $id_team;
  }
 }

 public function setIdSaison($id_saison)
 {
  if (is_string($id_saison))
  {
    $this->_id_saison = $id_saison;
  }
 }

 public function SetNbVictoire($nb_victoire){
  if (is_string($nb_victoire))
  {
    $this->_nb_victoire = $nb_victoire;
  }
 }
}

?>