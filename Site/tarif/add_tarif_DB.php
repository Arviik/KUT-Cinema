<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('INSERT INTO tarif (nom, prix_unitaire, description) VALUES (:nom, :prix_unitaire, :description)');
    $req->execute(array(
        "nom"=>$_POST['nom'],
        "prix_unitaire"=>$_POST['prix'],
        "description"=>$_POST['description'],
    ));
    header('Location: manage_tarif.php');