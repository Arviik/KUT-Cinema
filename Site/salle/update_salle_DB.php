<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('UPDATE salle SET nom = :nom, nb_place_salle = :nb_place_salle, ref_film = :ref_film WHERE id_salle = :id_salle;');
    $req->execute(array(
        "nom"=>$_POST['nom'],
        "nb_place_salle"=>$_POST['nb_place_salle'],
        "ref_film"=>$_POST['ref_film'],
        "id_salle"=>$_SESSION['id_salle'],
    ));
    header('Location: manage_salle.php');
