<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('INSERT INTO film (titre, annee_sortie, description, image_link, image_bg) VALUES (:titre, :annee_sortie, :description, :image_link, :image_bg)');
$req->execute(array(
    "titre"=>$_POST['titre'],
    "annee_sortie"=>$_POST['annee_sortie'],
    "description"=>$_POST['description'],
    "image_link"=>"../assets/img/affiche/eternels.jpg",
    "image_bg"=>"../assets/img/image_bg/bg-eternels.jpg"
));
header('Location: ../index.php');
