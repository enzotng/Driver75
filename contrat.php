<?php

// Récupération ou démarrage de la session

session_start();

$hostname = "localhost";
$username = "etang_admin";
$password = "driver75_";
$dbname = "etang_driver";

//Connexion à la base de données

$bdd = mysqli_connect($hostname, $username, $password, $dbname);

// Condition lorsque le "btnReserver" est cliqué, ajout des données dans la table Contrat

// On vérifie si l'utilisateur est connecté ou non. Si il n'est pas connecté, ce dernier sera redirigé vers la page de connexion
if (empty($_SESSION['id_client']) && empty($_SESSION['mdp_client'])) {
    
    // Si l'identifiant ainsi que le mot de passe client est inexistant ou nul, on le redirige vers le formulaire de login
    
    echo '<script type="text/javascript">';
    echo 'alert("Pour effectuer une réservation, vous devez vous connecter !");';
    echo 'window.location.href = "connexion.php";';
    echo '</script>';
}

if (isset($_POST['btnReserver'])) {
    $ids = $_SESSION['id_client'];
    $idv = $_POST['deroulant_voiture'];
    $date_dep = $_POST['date_depart'];
    $date_ret = $_POST['date_retour'];
    $query2 = "SELECT id_client FROM Clients WHERE id_client = $ids";
    mysqli_query($bdd, "SET NAMES 'utf8'");
    $req2 = mysqli_query($bdd, $query2);
    $ligne = mysqli_fetch_array($req2);
    $idc = $ligne['id_client'];
    $prix = $_POST['deroulant_voiture'];

    $query = "INSERT INTO Contrat (id_voiture, id_client, date_depart, date_retour, prix_total) VALUES('$idv', '$idc', '$date_dep', '$date_ret', '$prix')";
    mysqli_query($bdd, "SET NAMES 'utf8'");
    $result = mysqli_query($bdd, $query);
    $message_ajouter4 = "Votre réservation à bien été pris en compte, elle est disponible sur votre compte";
    echo '<script type="text/javascript">window.alert("' . $message_ajouter4 . '");</script>';
    header('Location: connexion.php');
    exit();
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="documents/css/style.css">
</head>

<body>
    
            <header class="sticky-top">
            <nav class="navbar navbar-expand-lg bg-black">
                <div class="container-fluid">
                    <a href="index.html" class="navbar-brand">
                        <img src="documents/img/logo2.png" height="64" alt="Driver75" />
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <i class="bi bi-list" style="font-size: 2rem; color: white"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <li>
                                <a href="index.html#services" class="nav-item nav-link color active">Services</a>
                            </li>
                            <li>
                                <a href="catalogue.php" class="nav-item nav-link color">Catalogue</a>
                            </li>
                        </div>
                        <div class="navbar-nav ms-auto btn-group dropstart">
                          <button type="button" class="btn btn-danger rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="connexion.php">Compte</a></li>
                            <li><a class="dropdown-item" href="deconnexion.php">Se déconnecter</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="admin.php">Espace Administrateur</a></li>
                          </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
    <main>

        <section class="section_bg_inscription">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="inscription_card">
                        <div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <img src="documents/img/logo2.png" class="brand_logo" alt="Logo">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form class="form-group" method="POST" action="">

                                <div class="form-group">
                                    <label>Nom de la voiture*</label>
                                    <select class="form-control text-center" name="deroulant_voiture" id="deroulant_voiture">
                                        <?php
                                        $servername = "localhost";
                                        $username = "etang_admin";
                                        $password = "driver75_";
                                        $database = "etang_driver";
                                        $conn = mysqli_connect($servername, $username, $password, $database);
                                        mysqli_set_charset($conn, "utf8mb4");
                                        echo "<option value=''>-- Veuillez choisir une voiture --</option>";
                                        $res = mysqli_query($conn, "SELECT id_voiture, nom_voiture, prix_voiture FROM Voitures");
                                        while ($var = mysqli_fetch_assoc($res)) {
                                            $id = $var['id_voiture'];
                                            $nom = $var['nom_voiture'];
                                            $prix = $var['prix_voiture'];
                                            echo "<option value='$id'>$nom - $prix € / jour</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label">Date de départ* :</label>
                                        <input type="date" class="form-control" id="date_depart" name="date_depart" required />
                                </div>

                                <div class="form-group">
                                    <label">Date de retour* :</label>
                                        <input type="date" class="form-control" id="date_retour" name="date_retour" required />
                                </div>

                                <p class="formulaire-texte">* Champs obligatoires</p>
                                <input class="btn login_btn" type="submit" name="btnReserver" value="Réserver" />
                                <input class="btn login_btn" type="reset" name="btnReset" value="Réinitialiser" onclick="window.location.reload();" />
                            </form>
                        </div>
                        <?php
                        if (isset($erreur)) {
                            echo '<font class="text-center" color="red">' . $erreur . "</font>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <div id="contact">
            <section id="formulaire">
                <div class="button">Contact</div>
                <div class="body">
                    <form action="mail.php" id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post" name="validation">
                        <div class="form-group">
                            <label>Nom* :</label>
                            <input type="text" id="name" name="name" required class="form-control" minlength="1" maxlength="20" />
                            <label>Email* :</label><span id="info"></span>
                            <input type="email" id="email" name="email" required class="form-control" minlength="1" maxlength="30" placeholder="examplemail.fr" />
                            <label>Message* :</label>
                            <textarea onKeyPress="if(event.keyCode == 13) validerForm();" id="message" name="message" required class="form-control" minlength="1" maxlength="200"></textarea>
                            <p class="formulaire-texte">* Champs obligatoires</p>
                            <br />
                            <input class="btn btn-danger" type="submit" name="btn_envoyer" value="Envoyer" />
                            <input class="btn btn-danger" type="reset" value="Réinitialiser" />
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="footer-container">
            <nav class="footer-inner">
                <div class="footer-section">
                    <a href="index.html" class="footer-a" target="_self">
                        <img src="documents/img/logo2.png" height="128" alt="LogoDriver">
                    </a>
                </div>

                <div class="footer-section">
                    <h3 class="titre-h3">Nos <b class="footer-couleur">Services</b></h3>
                    <ul class="footer-ul">
                        <li class="footer-li"><a class="footer-a" href="catalogue.php">Catalogue</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="titre-h3">Nos <b class="footer-couleur">Voitures</b></h3>
                    <ul class="footer-ul">
                        <li class="footer-li"><a class="footer-a" href="catalogue.php">Bugatti</a></li>
                        <li class="footer-li"><a class="footer-a" href="catalogue.php">Mercedes-Benz</a></li>
                        <li class="footer-li"><a class="footer-a" href="catalogue.php">Audi</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="titre-h3">À propos de <b class="footer-couleur">nous</b></h3>
                    <ul class="footer-ul">
                        <li class="footer-li"><a class="footer-a" href="#">Notre histoire</a></li>
                        <li class="footer-li"><a class="footer-a" href="#">Mentions légales</a></li>
                        <li class="footer-li"><a class="footer-a" href="cgv.html">Conditions de vente</a></li>
                    </ul>
                </div>

            </nav>

            <div class="section_paiement align-content-center">
                <i style="color: white; font-size: 1.5rem" class="bi bi-credit-card"></i>
                <img class="text-center" style="height: 1.5rem" src="documents/img/apple_pay.png" alt="ApplePay">
                <i style="color: white; font-size: 1.5rem" class="bi bi-paypal"></i>
            </div>
            <hr />
            <h3 class="footer-copyright">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Driver75. All Rights Reserved.
            </h3>
        </footer>
        <!-- Fin Footer -->

        <a href="#" class="backtotop">
            <span class="gauche-arm"></span>
            <span class="droite-arm"></span>
            <span class="fleche-slide"></span>
        </a>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="documents/js/main.js"></script>

</body>

</html>