<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('UPDATE tarif SET nom = :nom, prix_unitaire = :prix_unitaire, description = :description WHERE id_tarif = :id_tarif;');
    $req->execute(array(
        "nom"=>$_POST['nom'],
        "prix_unitaire"=>$_POST['prix_unitaire'],
        "description"=>$_POST['description'],
        "id_tarif"=>$_SESSION['id_tarif'],
    ));
    header('Location: manage_tarif.php');
