<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('SELECT * FROM salle WHERE id_salle = :id_salle');
    $req->execute(array(
        "id_salle"=>$_GET['id_salle'],
    ));
    $res1 = $req->fetch();
    $_SESSION['id_salle'] = $_GET['id_salle'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modif Salle</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
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
                        <li class="nav-item"><a class="nav-link" href="/Site/index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../film/listefilm.php">Films</a></li>
                        <?php
                        if (isset($_SESSION['id_client'])){
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue ".$_SESSION['prenom']."</a></li>
                                          <li class='nav-item'><a class='nav-link' href='../compte/deconnexion.php'>Déconnexion</a></li>";
                        }else{
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                          <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section pb-0" id="update_salle">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Modifier la salle : <?php echo $res1['nom']?></h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Modifier une salle de la base de donnée.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="update_salle_DB.php" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nom" type="text" value="<?php echo $res1['nom'] ?>" placeholder="Nom" data-sb-validations="required" name="nom" />
                                <label for="nom">Nom</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="nb_place_salle" aria-label=".form-select-sm">
                                    <?php
                                        for ($i = 1; $i < 101; $i++){
                                            if ($i == $res1['nb_place_salle']){
                                                echo "<option value='".$i."' selected size='1'>".$i."</option>";
                                            }else{
                                                echo "<option value='".$i."' size='1'>".$i."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="nb_place_salle">Nombre de place</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="ref_film" aria-label=".form-select-sm">
                                    <?php
                                        $req = $bdd->prepare('SELECT id_film, titre FROM film');
                                        $req->execute();
                                        $res2 = $req->fetchALL();
                                        foreach ($res2 as $val){
                                            if ($val['id_film'] == $res1['ref_film']){
                                                echo "<option value='".$val['id_film']."' selected>".$val['titre']."</option>";
                                            }else{
                                                echo "<option value='".$val['id_film']."'>".$val['titre']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="ref_film">Film diffusé</label>
                            </div>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Modifier la salle</button></div>
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