<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM reservation ORDER BY date_reservation desc;');
    $req->execute();
    $res1 = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion des Réservations</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNavListe">
            <div class="container px-4 px-lg-5">
                <a href="../index.php">
                    <img href="index.php" src="../assets/img/LogoKUTCinéma.png" height="75" alt="Logo de KUT cinéma">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../film/listefilm.php">Films</a></li>
                        <?php
                        if (isset($_SESSION['id_client'])){
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue " .$_SESSION['prenom']. "</a></li>
                                          <li class='nav-item'><a class='nav-link' href='historique_reservation.php'>Mes réservations</a></li>
                                          <li class='nav-item'><a class='nav-link' href='../compte/deconnexion_DB.php'>Déconnexion</a></li>";
                        }else{
                            echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                          <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                        }?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h4 class="mt-0">Historique de reservation</h4>
                    <hr class="divider"/>
                    <p class="text-muted mb-5">Gérer les réservations de la base de donnée.</p>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 20%" href="../index_admin.php"><u>Accueil admin</u></a>
                </div>
            </div>
            <div class="justify-content-center me-5 ms-5">
                <table class="table table-bordered ">
                    <thead>
                    <tr style="text-align: center">
                        <td>Nom du client</td>
                        <td>Salle</td>
                        <td>Nombre Place</td>
                        <td>Tarif</td>
                        <td>Moyen de paiement</td>
                        <td>Film réservé</td>
                        <td>Date de diffusion</td>
                        <td>Modifier reservation</td>
                        <td>Supprimer reservation</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!(isset($res1['0']['id_reservation']))){
                                echo "<tr>
                                        <td colspan='8' style='text-align: center'>Aucune reservation</td>
                                    </tr>
                                ";
                            }
                            else {
                                foreach ($res1 as $val) {
                                    $req = $bdd->prepare('SELECT * FROM client WHERE id_client = :id_client;');
                                    $req->execute(array(
                                        "id_client" => $val['ref_client'],
                                    ));
                                    $res2 = $req->fetch();

                                    $req = $bdd->prepare('SELECT * FROM salle WHERE id_salle = :id_salle;');
                                    $req->execute(array(
                                        "id_salle" => $val['ref_salle'],
                                    ));
                                    $res3 = $req->fetch();

                                    $req = $bdd->prepare('SELECT * FROM tarif WHERE id_tarif = :id_tarif;');
                                    $req->execute(array(
                                        "id_tarif" => $val['ref_tarif'],
                                    ));
                                    $res4 = $req->fetch();

                                    $req = $bdd->prepare('SELECT * FROM film WHERE id_film = :id_film;');
                                    $req->execute(array(
                                        "id_film" => $res3['ref_film'],
                                    ));
                                    $res5 = $req->fetch();

                                    echo "<tr style='text-align: center'>
                                            <td>".$res2['nom']."</td>
                                            <td>".$res3['nom']."</td>
                                            <td>".$val['nb_place_reservation'].' / '.$res3['nb_place_salle']."</td>
                                            <td>".$res4['nom']."</td>
                                            <td>".$val['moyen_paiement']."</td>
                                            <td>".$res5['titre']."</td>
                                            <td>".$val['date_reservation']."</td>
                                            <td>
                                                <form action='update_reservation.php' method='post'>
                                                    <input alt='Bouton modifier' type='image' src='../assets/img/update_logo.png' height='20'>
                                                    <input hidden type='text' name='id_reservation' value='".$val['id_reservation']."'>
                                                </form>
                                            </td>
                                            <td>
                                                <form action='delete_reservation_DB.php' method='post'>
                                                    <input alt='Bouton supprimer' type='image' src='../assets/img/delete_logo.png' height='20'>
                                                    <input hidden type='text' name='id_reservation' value='" . $val['id_reservation'] . "'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="d-flex justify-content-evenly">
                <div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinéma</div>
            </div>
        </footer>
    </body>
</html>