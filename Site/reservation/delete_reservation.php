<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('DElETE FROM reservation WHERE id_reservation LIKE :id_reservation AND ref_client LIKE :ref_client');
$req->execute(array(
    "id_reservation"=>$_POST['id_reservation'],
    "ref_client"=>$_POST['ref_client'],
));
header('Location: index.php');
