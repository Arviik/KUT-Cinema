<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('SELECT * FROM film WHERE id_film = :id_film');
    $req->execute(array(
        "id_film"=>$_GET['id_film'],
    ));
    $res1 = $req->fetch();
    $_SESSION['id_film'] = $_GET['id_film'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modif Film</title>
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
                        if (isset($_SESSION['id_client'])){
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue ".$_SESSION['prenom']. "</a></li>
                                                              <li class='nav-item'><a class='nav-link' href='../compte/deconnexion_DB.php'>Déconnexion</a></li>";
                        }else{
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                                              <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="update_film">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Modifier un film</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Modifier un film dans la base de donnée</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="update_film_DB.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="titre" type="text" value="<?php echo $res1['titre'] ?>" placeholder="Titre" data-sb-validations="required" name="titre" />
                                <label for="titre">Titre</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Le titre est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="annee_sortie" type="text" value="<?php echo $res1['annee_sortie'] ?>" placeholder="Année de sortie" data-sb-validations="required" name="annee_sortie" />
                                <label for="annee_sortie">Année de sortie</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">L'année de sortie est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="duree" type="text" value="<?php echo $res1['duree'] ?>" placeholder="Durée" data-sb-validations="required" name="duree" />
                                <label for="duree">Durée</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">La durée est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="genre" type="text" value="<?php echo $res1['genre'] ?>" placeholder="Genre" data-sb-validations="required" name="genre" />
                                <label for="genre">Genre</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Le genre est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="realisateur" type="text" value="<?php echo $res1['realisateur'] ?>" placeholder="Réalisateur" data-sb-validations="required" name="realisateur" />
                                <label for="realisateur">Réalisateur</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Le réalisateur est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="acteur" type="text" value="<?php echo $res1['acteur'] ?>" placeholder="Acteur" data-sb-validations="required" name="acteur" />
                                <label for="acteur">Acteur</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">L'acteur est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="description" type="text" value="<?php echo $res1['description'] ?>" placeholder="Description" data-sb-validations="required" name="description" />
                                <label for="description">Description</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">La description est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <div>
                                    <label for="image_link">Sélectionner l'image de l'affiche à envoyer</label>
                                    <input class="form-control" type="file" id="image_link" name="image_link" multiple accept=".jpg, .jpeg, .png">
                                </div>

                            </div>
                            <div class="form-floating mb-3">
                                <div>
                                    <label for="image_bg">Sélectionner l'image de fond à envoyer</label>
                                    <input class="form-control" type="file" id="image_bg" name="image_bg" multiple accept=".jpg, .jpeg, .png">
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Modifier le film</button>
                            </div>
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
