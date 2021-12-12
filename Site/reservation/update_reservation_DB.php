<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('UPDATE reservation SET nb_place_reservation = :nb_place_reservation, moyen_paiement = :moyen_paiement, date_reservation = :date_reservation, ref_client = :ref_client, ref_salle = :ref_salle, ref_tarif = :ref_tarif WHERE id_reservation = :id_reservation;');
    $req->execute(array(
        "nb_place_reservation" => $_POST['nb_place_reservation'],
        "moyen_paiement" => $_POST['moyen_paiement'],
        "date_reservation" => $_POST['date_reservation'],
        "ref_client" => $_POST['ref_client'],
        "ref_salle" => $_POST['ref_salle'],
        "ref_tarif" => $_POST['ref_tarif'],
        "id_reservation" => $_SESSION['id_reservation'],
    ));
    header('Location: manage_reservation.php');
