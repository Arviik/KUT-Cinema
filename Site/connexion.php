<?php
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('SELECT * FROM client WHERE nom = :nom AND mot_de_passe = :mdp');
$req->execute(array(
    "nom"=>$_POST['nom'],
    "mdp"=>$_POST['password'],
));
$res = $req->fetch();
if ($res){
    session_start();
    $_SESSION['nom'] = $res['nom'];
    $_SESSION['password'] = $res['mot_de_passe'];
    $_SESSION['id_client'] = $res['id_client'];
    header('Location: index.php');
}
else{
    header('Location: connexion.html');
}