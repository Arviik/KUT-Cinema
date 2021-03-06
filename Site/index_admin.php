<?php
session_start();
if (isset($_SESSION['id_client'])) {
    if ($_SESSION['id_client'] == 1) {

    }
    else {
        header('Location: ../Site/index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Accueil admin</title>
        <link rel="icon" type="image/x-icon" href="assets/img/LogoKUTCinéma.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNavListe">
            <div class="container px-4 px-lg-5">
                <a href="index.php">
                    <img href="/Site/index.php" src="assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="film/listefilm.php">Films</a></li>
                        <?php
                            if (isset($_SESSION['id_client'])){
                                echo "<li class='nav-item'><a class='nav-link' href='compte/modification.php'>Bienvenue ".$_SESSION['prenom']. "</a></li>
                                      <li class='nav-item'><a class='nav-link' href='reservation/historique_reservation.php'>Mes réservations</a></li>
                                      <li class='nav-item'><a class='nav-link' href='compte/deconnexion_DB.php'>Déconnexion</a></li>";
                            }else{
                                echo "<li class='nav-item'><a class='nav-link' href='compte/inscription.html'>Inscription</a></li>
                                      <li class='nav-item'><a class='nav-link' href='compte/connexion.html'>Connexion</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Gestionnaire de salle :</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-3">Gérer les salles de la base de donnée.</p>
                        <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 30%" href="salle/manage_salle.php">Gérer les salles</a>
                    </div>
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Gestionnaire de film :</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-3">Gérer les films de la base de donnée.</p>
                        <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 30%" href="film/manage_film.php">Gérer les films</a>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Gestionnaire de réservation :</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-3">Gérer les réservations de la base de donnée.</p>
                        <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 30%" href="reservation/manage_reservation.php">Gérer les réservations</a>
                    </div>
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Gestionnaire de tarif :</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-3">Gérer les tarif de la base de donnée.</p>
                        <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 30%" href="tarif/manage_tarif.php">Gérer les tarifs</a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
