<?php
session_start();
$date = date("Y-m-d");
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('INSERT INTO reservation (nb_place_reservation,moyen_paiement,date_reservation,ref_client,ref_salle,ref_tarif) VALUES (:nb_place_reservation,:moyen_paiement,:date_reservation,:ref_client,:ref_salle,:ref_tarif);');
$req->execute(array(
    "nb_place_reservation"=>$_POST['nb_place'],
    "moyen_paiement"=>$_POST['moyen_paiement'],
    "date_reservation"=>$date,
    "ref_client"=>$_SESSION['id_client'],
    "ref_salle"=>$_POST['salle'],
    "ref_tarif"=>$_POST['tarif'],
));
header('Location: ../index.php');
