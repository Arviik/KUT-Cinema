<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout Tarif</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNavListe">
            <div class="container px-4 px-lg-5">
                <a href="../index.php">
                    <img href="../index.php" src="../assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../film/listefilm.php">Films</a></li>
                        <?php
                        session_start();
                        if (isset($_SESSION['id_client'])){
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue " .$_SESSION['prenom']. "</a></li>
                                    <li class='nav-item'><a class='nav-link' href='../reservation/historique_reservation.php'>Mes réservations</a></li>
                                    <li class='nav-item'><a class='nav-link' href='../compte/deconnexion_DB.php'>Déconnexion</a></li>";
                        }else{
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                    <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                        }?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Ajouter un tarif</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-5">Ajouter un tarif dans la base de donnée</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="add_tarif_DB.php" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nom" type="text" placeholder="Nom" required data-sb-validations="required" name="nom" />
                                <label for="nom">Nom</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="prix" type="text" placeholder="Prix" required data-sb-validations="required" name="prix" />
                                <label for="prix">Prix unitaire</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un prix est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="description" type="text" placeholder="Description" required data-sb-validations="required" name="description" />
                                <label for="description">Description</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Une description est demander</div>
                            </div>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Ajouter le tarif</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
            </div>
        </footer>
    </body>
</html>