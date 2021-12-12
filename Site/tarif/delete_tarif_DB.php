<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('DElETE FROM tarif WHERE id_tarif = :id_tarif');
    $req->execute(array(
        "id_tarif" => $_POST['id_tarif'],
    ));
    header('Location: manage_tarif.php');