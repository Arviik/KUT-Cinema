<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('INSERT INTO salle (nom, nb_place_salle, ref_film) VALUES (:nom, :nb_place_salle, :ref_film)');
    $req->execute(array(
        "nom"=>$_POST['nom'],
        "nb_place_salle"=>$_POST['nb_place_salle'],
        "ref_film"=>1,
    ));
    header('Location: manage_salle.php');