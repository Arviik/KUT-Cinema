<?php
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('INSERT INTO client (nom,prenom,mot_de_passe,email) VALUES (:nom,:prenom,:mot_de_passe,:email);');
$req->execute(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mot_de_passe"=>$_POST['password'],
    "email"=>$_POST['email'],
));
header('Location: ../index.php');
