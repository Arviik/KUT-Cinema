<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('DElETE FROM reservation WHERE id_reservation=:id_reservation');
$req->execute(array(
    "id_reservation"=>$_POST['id_reservation'],
));
header('Location: historiquereservation.php');
