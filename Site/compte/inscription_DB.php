<?php
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('INSERT INTO client (nom, prenom, mot_de_passe, email) VALUES (:nom, :prenom, :mot_de_passe, :email);');
    $req->execute(array(
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "mot_de_passe"=>sha1($_POST['password']),
        "email"=>$_POST['email'],
    ));
    header('Location: ../index.php');
}else{
    echo "L'adresse e-mail n'est pas valide";
    header('Location: ../compte/inscription.html');
}

