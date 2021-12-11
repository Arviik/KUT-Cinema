<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('DElETE FROM reservation WHERE id_reservation=:id_reservation AND ref_client=:id_client');
$req->execute(array(
    "id_reservation"=>$_POST['id_reservation'],
    "id_client"=>$_SESSION['id_client']
));
header('Location: historiquereservation.php');
