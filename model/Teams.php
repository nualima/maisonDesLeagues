<?php

namespace model;

class Teams 
{
    private $_id,
            $_name,
            $_city;
    
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
  public function getTeams()
  {
      return $this->_teams;
  }

  public function getId()
  {
      return $this->_id;
  }
  public function getname(){

    return $this->_name;
  }
  public function getcity(){

    return $this->_city;
  }

 // SETTER 

 public function setTeams(){

    return $this->_Teams;
  }

 public function setIdTeam($name)
 {
  if (is_string($name))
  {
    $this->_name = $name;
  }
 }

 public function setIdSaison($city)
 {
  if (is_string($city))
  {
    $this->_city = $city;
  }
 }

}

?>