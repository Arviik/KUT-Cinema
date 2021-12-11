<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('DElETE FROM film WHERE id_film = :id_film');
    $req->execute(array(
        "id_film"=>$_GET['id_film'],
    ));
    header('Location: manage_film.php');