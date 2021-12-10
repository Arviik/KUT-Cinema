<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM film');
    $req->execute();
    $res1 = $req->fetchall();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion Film</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNavListe">
            <div class="container px-4 px-lg-5">
                <a href="../index.php">
                    <img href="/Site/index.php" src="../assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li  class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Films</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <?php
                            if (isset($_SESSION['id_client'])){
                                echo "<li class='nav-item'><a class='nav-link' href='/Site/compte/connexion.html'>Bienvenue " .$_SESSION['prenom']. "</a></li>
                                      <li class='nav-item'><a class='nav-link' href='/Site/compte/modification.php'>Modifier profil</a></li>
                                      <li class='nav-item'><a class='nav-link' href='/Site/compte/deconnexion.php'>Déconnexion</a></li>";
                            }else{
                                echo "<li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>
                                      <li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                        foreach ($res1 as $film): ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?php echo $film['image_bg'] ?>" height="250" class="m-0 rounded" alt="">
                                <img src="<?php echo $film['image_link'] ?>" class="m-0" width="125" style="position: absolute; left: 3%; top: 45%; border: 1px black solid; border-radius: 5px;" alt="">
                                <div class="card-body ps-0 pe-0 " style="height: 60%">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 35%;"></td>
                                            <td style="width: auto;">
                                                <h5 class="m-0"><?php echo $film['titre'] ?></h5>
                                                <p class="small m-0"><?php echo $film['annee_sortie'] ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class='d-grid gap-2 d-md-flex'>
                                        <a class='btn btn-primary btn-sm' role='button' style='width: 48%;' href='update_film.php?id_film=<?php echo $film['id_film']?>'>Modifier</a>
                                        <a class='btn btn-primary btn-sm' role='button' style='width: 48%;' href='delete_film.php?id_film=<?php echo $film['id_film']?>'>Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <a href="../film/add_film.html" class="small text-muted">Ajout film</a>
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
                <a href="../salle/add_salle.html" class="small text-muted">Ajout salle</a>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>