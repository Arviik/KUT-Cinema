<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modification Profil</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    </head>
    <body id="page-top">
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
                    if (isset($_SESSION['id_client'])){
                        echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue ".$_SESSION['prenom']. "</a></li>
                                  <li class='nav-item'><a class='nav-link' href='historique_reservation.php'>Mes réservations</a></li>
                                  <li class='nav-item'><a class='nav-link' href='../compte/deconnexion_DB.php'>Déconnexion</a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                  <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                    }?>
                </ul>
            </div>
        </div>
    </nav>
        <section class="page-section">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h4 class="mt-0">Historique de reservation</h4>
                    <hr class="divider" />
                </div>
            </div>
            <div class="justify-content-center me-5 ms-5">
                <table class="table table-bordered ">
                    <thead>
                        <tr style="text-align: center">
                            <td>Salle</td>
                            <td>Nombre Place</td>
                            <td>Tarif</td>
                            <td>Moyen de paiement</td>
                            <td>Date de diffusion</td>
                            <td>Supprimer reservation</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
                        $req = $bdd->prepare('SELECT * FROM reservation WHERE ref_client=:id_client ORDER BY date_reservation desc');
                        $req->execute(array(
                            "id_client"=>$_SESSION['id_client']
                        ));
                        $res = $req->fetchAll();
                        if (!(isset($res['0']['id_reservation']))){
                            echo "<tr><td colspan='6' style='text-align: center'>Aucune reservation</td></tr>";
                        }
                        foreach ($res as $reservation){
                            echo "<tr style='text-align: center'>
                                    <td>".$reservation['ref_salle']."</td>
                                    <td>".$reservation['nb_place_reservation']."</td>
                                    <td>".$reservation['ref_tarif']."</td>
                                    <td>".$reservation['moyen_paiement']."</td>
                                    <td>".$reservation['date_reservation']."</td>
                                    <td>
                                        <form action='delete_reservation_DB.php' method='post'>
                                            <input alt='Bouton supprimer' type='image' src='../assets/img/delete_logo.png' height='20'>
                                            <input hidden type='text' name='id_reservation' value='".$reservation['id_reservation']."'>
                                        </form>
                                    </td>
                                  </tr>
                            ";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
            </div>
        </footer>
    </body>
</html>