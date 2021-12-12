<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Reservation valide</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet"/>
    <link href="../css/styles.css" rel="stylesheet"/>
</head>
<body style="background-color: rgb(244, 98, 58);">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNavListe">
        <div class="container px-4 px-lg-5">
            <a href="../index.php">
                <img href="index.php" src="../assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../film/listefilm.php">Films</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['id_client'])){
                        echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue ".$_SESSION['prenom']. "</a></li>
                                      <li class='nav-item'><a class='nav-link' href='../reservation/historique_reservation.php'>Reservation</a></li>
                                      <li class='nav-item'><a class='nav-link' href='../compte/deconnexionDB.php'>Déconnexion</a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                      <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                    }?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="ticket">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM film WHERE id_film=:id_film');
        $req->execute(array(
                "id_film"=>$_SESSION['id_film']
        ));
        $res = $req->fetch();
        $req2 = $bdd->prepare('SELECT * FROM salle WHERE id_salle=:id_salle');
        $req2->execute(array(
            "id_salle"=>$_SESSION['id_salle']
        ));
        $res2 = $req2->fetch();
        ?>
        <img src="../assets/img/ticket.png" alt="ticket" style="width: 1080px">
        <p class="police" style="top: 3%; font-size: 2em"><u>TICKET KUT CINEMA</u></p>
        <hr class="divider" style="top: 30px;"/>
        <img class="rounded-2" src="<?php echo $res['image_link'] ?>" style="z-index: 5; position:absolute; width: 25%; top: 20%; left: 15%">
        <!--<p class="police" style="top: 20%; right: 30%; font-size: 1em"><u>Film :</u></p>
        <p class="police" style="top: 23%; right: 24%; font-size: 1.5em">Encanto</p>
        <p class="police" style="top: 30%; right: 30%; font-size: 1em"><u>Salle :</u></p>
        <p class="police" style="top: 33%; right: 27.5%; font-size: 1.5em">Salle 1</p>
        <p class="police" style="top: 39%; right: 21%; font-size: 1em"><u>Nombre de place :</u></p>
        <p class="police" style="top: 42%; right: 31%; font-size: 1.5em">4</p>-->
        <table class="table police" style="position: absolute; width: 50%; top: 20%; right: 5%">
            <tr>
                <td>Film :</td>
                <td><?php echo $res['titre']?></td>
            </tr>
            <tr>
                <td>Salle :</td>
                <td><?php echo $res2['nom']?></td>
            </tr>
            <tr>
                <td>Nombre de place :</td>
                <td><?php echo $_SESSION['nb_place']?></td>
            </tr>
            <tr>
                <td>Durée du film :</td>
                <td><?php echo $res['duree']?></td>
            </tr>
            <tr>
                <td>Tarif :</td>
                <td><?php echo $_SESSION['tarif']?></td>
            </tr>
            <tr>
                <td>Moyen de paiement :</td>
                <td><?php echo $_SESSION['moyen_paiement']?></td>
            </tr>
        </table>
        <h3 class="police" style="position: absolute; width: 40%; top: 70%; right: 7%">Passez une bonne séance !</h3>
    </div>
    <a href="../index.php"><button class="btn btn-light btn-xl retour" style="  position: absolute; top: 90%; right: 5%;">Retour à l'acceuil</button></a>
</body>
</html>