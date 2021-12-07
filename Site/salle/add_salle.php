<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('INSERT INTO salle (nom, nb_place_salle) VALUES (:nom, :nb_place_salle)');
$req->execute(array(
    "nom"=>$_POST['nom'],
    "nb_place_salle"=>$_POST['nb_place_salle'],
));
header('Location: ../index.php');
