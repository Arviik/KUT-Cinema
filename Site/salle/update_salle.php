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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a href="../index.php">
                    <img href="index.php" src="../assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
            </div>
        </nav>
        <section class="page-section" id="contact">
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
                        <form action="updateDB.php" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nom" type="text" value="<?php echo $res1['nom'] ?>" placeholder="Nom" data-sb-validations="required" name="nom" />
                                <label for="nom">Nom</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nb_place_salle" type="text" value="<?php echo $res1['nb_place_salle'] ?>" placeholder="Nombre de place" data-sb-validations="required" name="nb_place_salle" />
                                <label for="nb_place_salle">Nombre de place</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Le nombre de place est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="ref_film" type="text" value="<?php echo $res1['ref_film'] ?>" placeholder="Film diffusé" name="ref_film" />
                                <label for="ref_film">id du Film diffusé</label>
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
                <a href="../film/ajoutfilm.html" class="small text-muted">Ajout film</a>
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
                <a href="../salle/add_salle.html" class="small text-muted">Ajout salle</a>
            </div>
        </footer>
    </body>
</html>