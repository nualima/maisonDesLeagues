<?php
namespace model;

use model\users;

class UsersManager extends Manager
{
public function add(){


}
public function update(){


}
public function remove(){


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
