<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('DElETE FROM salle WHERE id_salle = :id_salle');
    $req->execute(array(
        "id_salle"=>$_GET['id_salle'],
    ));
    header('Location: manage_salle.php');