<?php
session_start();
if (isset($_SESSION['id_client'])) {
    if ($_SESSION['id_client'] == 1) {

    }
    else {
        header('Location: ../Site/index.php');
    }
}
?>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM tarif;');
    $req->execute();
    $res1 = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion des Tarifs</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    </head>
    <body id="page-top">
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
        <section class="page-section">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h4 class="mt-0">Gestionnaire de tarif :</h4>
                    <hr class="divider"/>
                    <p class="text-muted mb-5">Gérer les tarifs de la base de donnée.</p>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 20%" href="../index_admin.php"><u>Accueil admin</u></a>
                    <a class="btn btn-primary btn-xl px-0 mx-4 my-4" role="button" style="width: 20%" href="add_tarif.php">Ajouter un tarif</a>
                </div>
            </div>
            <div class="justify-content-center me-5 ms-5">
                <table class="table table-bordered ">
                    <thead>
                    <tr style="text-align: center">
                        <td>Nom du tarif</td>
                        <td>Prix unitaire</td>
                        <td>Description</td>
                        <td>Nombre de réservation</td>
                        <td>Nombre de places</td>
                        <td>Modifier le tarif</td>
                        <td>Supprimer le tarif</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($res1 as $val) {
                                $req = $bdd->prepare('SELECT count(*) FROM reservation WHERE ref_tarif = :ref_tarif;');
                                $req->execute(array(
                                    "ref_tarif" => $val['id_tarif'],
                                ));
                                $res2 = $req->fetch();

                                $req = $bdd->prepare('SELECT sum(nb_place_reservation) FROM reservation WHERE ref_tarif = :ref_tarif;');
                                $req->execute(array(
                                    "ref_tarif" => $val['id_tarif'],
                                ));
                                $res3 = $req->fetch();

                                echo "<tr style='text-align: center'>
                                        <td>".$val['nom']."</td>
                                        <td>".$val['prix_unitaire']."</td>
                                        <td>".$val['description']."</td>
                                        <td>".$res2['count(*)']."</td>
                                        <td>".$res3['sum(nb_place_reservation)']."</td>
                                        <td>
                                            <form action='update_tarif.php' method='post'>
                                                <input alt='Bouton modifier' type='image' src='../assets/img/update_logo.png' height='20'>
                                                <input hidden type='text' name='id_tarif' value='".$val['id_tarif']."'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action='delete_tarif_DB.php' method='post'>
                                                <input alt='Bouton supprimer' type='image' src='../assets/img/delete_logo.png' height='20'>
                                                <input hidden type='text' name='id_tarif' value='".$val['id_tarif']."'>
                                            </form>
                                        </td>
                                    </tr>
                                ";
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