<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('UPDATE film SET titre = :titre, annee_sortie = :annee_sortie, duree = :duree, genre = :genre, realisateur = :realisateur, acteur = :acteur, description = :description, image_link = :image_link, image_bg = :image_bg WHERE id_film = :id_film;');
    $req->execute(array(
        "titre"=>$_POST['titre'],
        "annee_sortie"=>$_POST['annee_sortie'],
        "duree"=>$_POST['duree'],
        "genre"=>$_POST['genre'],
        "realisateur"=>$_POST['realisateur'],
        "acteur"=>$_POST['acteur'],
        "description"=>$_POST['description'],
        "image_link"=>"../assets/img/affiche/".$_FILES['image_link']['name'],
        "image_bg"=>"../assets/img/image_bg/".$_FILES['image_bg']['name'],
        "id_film"=>$_SESSION['id_film'],
    ));
    header('Location: manage_film.php');
