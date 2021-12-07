<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reserver place</title>
    <link href="/Site/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/Site/assets/img/LogoKUTCinéma.png"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a href="/Site/index.php">
            <img href="index.php" src="/Site/assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
        </a>
    </div>
</nav>
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Reservation</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Reserve ta place pour voir ton film !</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form action="/Site/reservation/reservationDB.php" method="post">
                    <input name="id" type="text" <?php echo "value='".$_SESSION['id_client']."'"?> hidden>
                    <div class="form-floating mb-3">
                        <select id="salle" class="form-select" name="salle">
                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
                            $req = $bdd->query('SELECT * FROM salle');
                            $res = $req->fetchall();
                            foreach ($res as $salle) {
                                echo "<option value='".$salle['id_salle']."'>".$salle['nom']."</option>";
                            }
                            ?>
                        </select>
                        <label for="salle">Salle</label>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="d-flex justify-content-lg-around">
                            <label>Carte bancaire
                                <input type="radio" name="moyen_paiement" value="CB">
                            </label>
                            <label>PayPal
                                <input type="radio" name="moyen_paiement" value="paypal">
                            </label>
                            <label>Espèces
                                <input type="radio" name="moyen_paiement" value="espece">
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="tarif" class="form-select" name="tarif">
                            <?php
                            $req = $bdd->query('SELECT * FROM tarif');
                            $res = $req->fetchall();
                            foreach ($res as $tarif) {
                                echo "<option value='".$tarif['id_tarif']."'>".$tarif['nom']."</option>";
                            }
                            ?>
                        </select>
                        <label for="tarif">Tarif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="nb_place" class="form-select" name="nb_place">
                            <?php
                            for ($i = 1; $i <= 50; $i++) {
                                echo "<option value='" . $i . "'>" . $i . "</option>";
                            }
                            ?>
                        </select>
                        <label for="nb_place">Nombre de place </label>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Modifier profil</button></div>
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
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - KUT-Cinema</div></div>
</footer>

</body>
</html>