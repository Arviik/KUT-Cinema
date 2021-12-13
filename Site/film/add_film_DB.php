<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('INSERT INTO film (titre, annee_sortie, duree, genre, realisateur, acteur, description, image_link, image_bg) VALUES (:titre, :annee_sortie, :duree, :genre, :realisateur, :acteur, :description, :image_link, :image_bg);');
    $req->execute(array(
        "titre" => $_POST['titre'],
        "annee_sortie" => $_POST['annee_sortie'],
        "duree" => $_POST['duree'],
        "genre" => $_POST['genre'],
        "realisateur" => $_POST['realisateur'],
        "acteur" => $_POST['acteur'],
        "description" => $_POST['description'],
        "image_link" => "../assets/img/affiche/".$_FILES['image_link']['name'],
        "image_bg" => "../assets/img/image_bg/".$_FILES['image_bg']['name'],
    ));
    header('Location: manage_film.php');
