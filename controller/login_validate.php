<?php

if (isset($_POST['login'], $_POST['password']) && $_POST['login'] !== '' && $_POST['password'] !== '') {
  require './connection_bdd.php';

  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if (isset($_POST['login']) && $_POST['login'] !== '') {
    $q = $bdd->prepare('SELECT COUNT(*) FROM `users` WHERE login=:login');
    $q->bindValue('login', $_POST['login']);
    $q->execute();

    //si aucune ligne ne remonte 
    if ($q->fetchColumn() == 0) {
      $requete = $bdd->prepare("INSERT INTO users(`login`, `password`) VALUES( :login, :password)");
      $requete->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
      $requete->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
      $res = $requete->execute();
      $_SESSION['pseudo'] = $_POST['login'];
      header('Location: ../reussite.php');
    } else {
      // TODO: faire une page erreur
      // header('Location: ../error.php');
    }


    exit();
  }
}
