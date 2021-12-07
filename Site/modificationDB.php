<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('UPDATE client SET nom=:nom,prenom=:prenom,mot_de_passe=:mot_de_passe,email=:email WHERE id_client=:id');
$req->execute(array(
    "id"=>$_POST['id'],
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mot_de_passe"=>$_POST['password'],
    "email"=>$_POST['email'],
));
$_SESSION['email']=$_POST['email'];
$_SESSION['prenom']=$_POST['prenom'];
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['id_client'] = $_POST['id'];
header('Location: index.php');
