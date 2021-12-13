<?php
$id_film = $_GET["id_film"];
$bdd = new PDO('mysql:host=localhost;dbname=kut-cinema;charset=utf8','root','');
$req = $bdd->prepare('SELECT * FROM film WHERE id_film = :id');
$req->execute(array(
    "id"=>$id_film,
));
$res = $req->fetch();
if ($res){
    session_start();
    $_SESSION['titre']= $res['titre'];
    $_SESSION['annee_sortie']= $res['annee_sortie'];
    $_SESSION['description'] = $res['description'];
    $_SESSION['image_link'] = $res['image_link'];
    $_SESSION['id_film'] = $res['id_film'];
    $_SESSION['image_bg'] = $res['image_bg'];
    $_SESSION['duree'] = $res['duree'];
    $_SESSION['realisateur'] = $res['realisateur'];
    $_SESSION['genre'] = $res['genre'];

}
else{
    echo"marche pas";
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KUT Cinéma</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/LogoKUTCinéma.png"/>
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">
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
                    echo "<li class='nav-item'><a class='nav-link' href='../compte/modification.php'>Bienvenue ".$_SESSION['prenom']. "</a></li>
                                  <li class='nav-item'><a class='nav-link' href='../reservation/historique_reservation.php'>Reservation</a></li>
                                  <li class='nav-item'><a class='nav-link' href='../compte/deconnexion_DB.php'>Déconnexion</a></li>";
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='../compte/inscription.html'>Inscription</a></li>
                                  <li class='nav-item'><a class='nav-link' href='../compte/connexion.html'>Connexion</a></li>";
                }?>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<?php
if (isset($_SESSION['id_film'])){
    echo " <header class='masthead' 
    padding-top: 10rem; 
     padding-bottom: calc(10rem - 4.5rem);
    style='background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url(".$_SESSION['image_bg']. ");
     background-position: center;
     background-repeat: no-repeat;
     background-attachment: scroll;
     background-size: cover;'>";
}?>
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content text-center">
            <div class="col">
                <?php
                            if (isset($_SESSION['id_film'])){
                                echo "<div class='col-lg-4 col-sm-6'>
                                      <a class='portfolio-box' href='/Site/assets/img/affiche/encanto.jpg' title='Encanto'>
                                      <img class='img-fluidi' src=" . $_SESSION['image_link']. " alt='...' /></a>
                                      </div>";
                                }?>

            </div>
            <div class="col"><?php
                    if (isset($_SESSION['id_film'])){
                        echo "<h1 style='color:white;'> " . $_SESSION['titre']. "</h1></br>
                        <p style='color:white;' class='police'> Durée : " . $_SESSION['duree']. "</p> ";
                    }?></div>
        </div>
        </div>
<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content">
            <div class="col-lg-6 col-md-9 text">
                <?php
                if (isset($_SESSION['id_film'])){
                    echo "<p class= 'text-white-75 mb-3'>

                    Titre original : " . $_SESSION['titre']. "</br>

                    Date de sortie : " . $_SESSION['annee_sortie']. "</br>
                    
                    Durée : " . $_SESSION['duree']. "</br>
                    
                    Genre : " . $_SESSION['genre']. "</br>

                    Réalisé par " . $_SESSION['realisateur']. "</br>
                    </p>";
                }?>
                <form action="../reservation/add_reservation.php" method="post">
                    <?php
                    if (isset($_SESSION['id_client'])){
                        echo "<input type='submit' class='btn btn-light btn-xl' href='../reservation/reservation.php' value='Achetez vos places'>";
                    }else{
                        echo "<input disabled type='submit' class='btn btn-light btn-xl' href='../reservation/reservation.php' value='Achetez vos places'>";
                    }
                    ?>

                </form>

            </div>
            <div class="col-lg-6 col-md-9 text">
                <div class="col-size text-center"><p class="police">Synopsis</p></div>
                <?php
                if (isset($_SESSION['id_film'])){
                    echo "<p class='text-white-75 mb-3'>" . $_SESSION['description']. "</p>";
                }?>


            </div>
        </div>

    </div>
</section>
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - KUT Cinema</div></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>