<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KUT Cinéma</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/LogoKUTCinéma.png"/>
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a href="index.php">
                    <img href="index.php" src="assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Films</a></li>
                        <?php
                            session_start();
                            if (isset($_SESSION['id_client'])){
                                echo "<li class='nav-item'><a class='nav-link' href='compte/connexion.html'>Bienvenue " .$_SESSION['prenom']. "</a></li>
                                      <li class='nav-item'><a class='nav-link' href='compte/modification.php'>Modifier profil</a></li>
                                      <li class='nav-item'><a class='nav-link' href='compte/deconnexion.php'>Déconnexion</a></li>";
                            }else{
                                echo "<li class='nav-item'><a class='nav-link' href='compte/connexion.html'>Connexion</a></li>
                                      <li class='nav-item'><a class='nav-link' href='compte/inscription.html'>Inscription</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Votre cinéma favori !</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-7 align-self-baseline">
                        <p class="text-white-75 mb-6">Regardez notre sélection des films du moments à retrouver dans nos salles !</p>
                        <a class="btn btn-primary btn-xl" href="#about">Voir les films à l'affiche</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Nous sommes <b>LE</b> cinéma que vous avez besoin !</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Avec notre sélection de films de qualité, vous ne serrez jamais déçu en salle !</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <!--<section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Sturdy Themes</h3>
                            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Films-->
        <form method="post" action="film/affiche.php"></form>
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="film/affiche.php?id_film=2" title="Encanto">
                            <img class="img-fluid" src="assets/img/affiche/encanto.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">Encanto</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="film/affiche.php?id_film=3" title="SOS Fantome">
                            <img class="img-fluid" src="assets/img/affiche/sosfantome.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">SOS Fantome</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href=film/affiche.php?id_film=4" title="Project Name">
                            <img class="img-fluid" src="assets/img/affiche/eternels.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">Eternels</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="film/affiche.php?id_film=5" title="Project Name">
                            <img class="img-fluid" src="assets/img/affiche/gucci.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">House of gucci</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="film/affiche.php?id_film=6" title="Project Name">
                            <img class="img-fluid" src="assets/img/affiche/supremes.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">Supremes</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="film/affiche.php?id_film=7" title="Project Name">
                            <img class="img-fluid" src="assets/img/affiche/venom.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">FILM</div>
                                <div class="project-name">Venom</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white pt-4 pb-4">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4 ">Voir toute la liste des films ici !</h2>
                <a class="btn btn-light btn-xl" href="film/listefilm.php">Voir la liste de film</a>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <a href="film/add_film.html" class="small text-muted">Ajout film</a>
                <a href="salle/add_salle.html" class="small text-muted">Ajout salle</a>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
