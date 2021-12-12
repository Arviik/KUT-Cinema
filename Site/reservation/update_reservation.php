<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
    $req = $bdd->prepare('SELECT * FROM reservation WHERE id_reservation = :id_reservation');
    $req->execute(array(
        "id_reservation"=>$_POST['id_reservation'],
    ));
    $res1 = $req->fetch();
    $_SESSION['id_reservation'] = $_POST['id_reservation'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout Réservation</title>
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
                        <h2 class="mt-0">Reservation</h2>
                        <hr class="divider"/>
                        <p class="text-muted mb-5">Modifie ta place pour voir ton film !</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="add_reservation_DB.php" method="post">
                            <div class="form-floating mb-3">
                                <?php
                                    $req = $bdd->prepare('SELECT * FROM salle WHERE ref_film = :ref_film');
                                    $req->execute(array(
                                        "ref_film"=>$_SESSION['id_film']
                                    ));
                                    $res = $req->fetchAll();
                                ?>
                                <select id="salle" class="form-select" name="salle">
                                    <?php
                                        if (!(isset($res['0']['id_salle']))){
                                            echo "<option disabled selected>Aucune salle disponible pour le moment</option>";
                                        }
                                        foreach ($res as $salle){
                                            if ($salle['id_salle'] == $res1['ref_salle']){
                                                echo "<option value='".$salle['id_salle']."' selected>".$salle['nom']."</option>";
                                            }else{
                                                echo "<option value='".$salle['id_salle']."'>".$salle['nom']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                <label for='salle'>Salle</label>
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
                                            if ($tarif['id_tarif'] == $res1['ref_salle']){
                                                echo "<option value='".$tarif['id_tarif']."' selected>".$tarif['nom']."</option>";
                                            }else{
                                                echo "<option value='".$tarif['id_tarif']."'>".$tarif['nom']."</option>";
                                            }
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
                            <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Reserver votre place</button></div>
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
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - KUT-Cinema</div></div>
        </footer>
    </body>
</html>