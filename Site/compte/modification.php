<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modification Profil</title>
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
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Modification</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-5">Modifie ton compte et regarde les tout derniers film à l'affiche!!!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="modification_DB.php" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nom" type="text" placeholder="Nom" data-sb-validations="required" name="nom" <?php echo "value='".$_SESSION['nom']."'"?> />
                                <label for="nom">Nom</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="prenom" type="text" placeholder="Prénom" data-sb-validations="required" name="prenom" <?php echo "value='".$_SESSION['prenom']."'"?> />
                                <label for="prenom">Prénom</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un prénom est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="text" placeholder="E-Mail" data-sb-validations="required" name="email" <?php echo "value='".$_SESSION['email']."'" ?> />
                                <label for="email">E-Mail</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un e-mail est demander</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="mdp" type="password" placeholder="Mot de passe" data-sb-validations="required" name="password" <?php echo "value='".$_SESSION['password']."'"?> />
                                <label for="mdp">Mot de passe</label>
                                <div class="invalid-feedback" data-sb-feedback="mdp:required">Mot de passe requis</div>
                            </div>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Modifier profil</button>
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