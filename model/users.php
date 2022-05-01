<?php

namespace model;

class Users
{
  private $_id,
          $_user,
          $_login,
          $_password;
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

  public function getUsers()
  {
    return $this->_users;
  }
  public function getid()
  {
    return $this->_id;
  }
  public function getlogin()
  {
    return $this->_login;
  }
  public function getpassword()
  {
    return $this->_password;
  }

  

//SETTER

public function setUsers()
  {
    return $this->_users;
  }
public function setLogin($login)
  {
    if (is_string($login))
    {
      $this->_login = $login;
    }
  }
  public function setPassword($password)
  {
    if (is_string($password))
    {
      $this->_password = $password;
    }
  }




}

  ?>