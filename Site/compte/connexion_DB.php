<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('SELECT * FROM client WHERE email = :email AND mot_de_passe = :mdp');
    $req->execute(array(
        "email"=>$_POST['email'],
        "mdp"=>sha1($_POST['password']),
    ));
    $res = $req->fetch();
    if ($res){
        session_start();
        $_SESSION['id_client'] = $res['id_client'];
        $_SESSION['nom'] = $res['nom'];
        $_SESSION['prenom'] = $res['prenom'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['password'] = $res['mot_de_passe'];
        header('Location: ../index.php');
    }
    else{
        header('Location: connexion.html');
    }