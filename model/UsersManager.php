<?php
namespace model;

use PDO;
use model\users;

class UsersManager extends Manager
{
public function add(){


}
public function update(){


}
public function remove(){


}
public function userLogin(){

  $requete = $this->manager->db->prepare("SELECT * FROM `users` WHERE login=:login AND password=:password ");
  $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
  $requete->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

  $requete->execute();
  $result = $requete->fetchAll(\PDO::FETCH_ASSOC);
  if($result){
    return $result;
  }else {
    return false;
  }
  
}

public function listUsers(){

    $cpt = $this->manager
    ->db
    ->query('SELECT COUNT(*) FROM users')->fetchColumn();
    return $cpt;
}
public function getAllListUsers()
  {
      $users = [];
      $q = $this->manager
                ->db
                ->prepare( 'SELECT * FROM users' );
      $q->execute();
      $listRes = $q->fetchAll(\PDO::FETCH_ASSOC);
      return $listRes;
      
  }


}
