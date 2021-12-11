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
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Films</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<?php
if (isset($res['id_film'])){
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
                <?php
                            if (isset($res['id_film'])){
                                echo "<div class='col-lg-4 col-sm-6'>
                                      <a class='portfolio-box' href='/Site/assets/img/affiche/encanto.jpg' title='Encanto'>
                                      <img class='img-fluidi' src=" . $res['image_link']. " alt='...' /></a>
                                      </div>";
                                }?>


        </div>

        </div>
<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content">
            <div class="col-lg-6 col-md-9 text">
                <?php
                if (isset($res['id_film'])){
                    echo "<p class= 'text-white-75 mb-3'>Genre : " . $res['genre']. "</br>

                    Titre original : " . $res['titre']. "</br>

                    Date de sortie : " . $res['annee_sortie']. "</br>

                    Réalisé par " . $res['realisateur']. "</br>

                    Durée : " . $_SESSION['duree']. "</br>

                    Avec Camille Timmerman, José Garcia, Juan Arbelaez, Dominique Quesnel, Julián Andrés Ortiz Cardona</p>";
                }?>
                <form action="../reservation/reservation.php" method="post">
                    <input type="submit" class="btn btn-light btn-xl" href="../reservation/reservation.php" value="Achetez vos places">
                </form>

            </div>
            <div class="col-lg-6 col-md-9 text">
                <div class="col-size text-center"><p class="police">Synopsis</p></div>
                <?php
                if (isset($res['id_film'])){
                    echo "<p class='text-white-75 mb-3'>" . $res['description']. "</p>";
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