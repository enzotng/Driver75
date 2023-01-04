<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=etang_driver', 'etang_admin', 'driver75_');

// On vérifie si l'utilisateur est connecté ou non. Si il n'est pas connecté, ce dernier sera redirigé vers la page de connexion
if (empty($_SESSION['id_client']) && empty($_SESSION['mdp_client'])) {
    // Si l'identifiant ainsi que le mot de passe client est inexistant ou nul, on le redirige vers le formulaire de login
    echo '<script type="text/javascript">';
    echo 'alert("Pour accéder à votre profil, veuillez vous connecter !");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
}

if (isset($_GET['id_client']) and $_GET['id_client'] > 0) {
    $getid = intval($_GET['id_client']);
    $requser = $bdd->prepare('SELECT * FROM Clients WHERE id_client = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil | Driver75</title>

        <link href="documents/img/logo_accueil.png" rel="icon" />

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                              <button type="button" class="btn btn-danger rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</button>
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

            <div class="container-xl px-4 mt-4 rounded-sm">

                <div class="nav nav-borders">
                    <p class="nav-link active ms-0">Profil de : <?php echo $userinfo['mail_client']; ?></a>
                </div>
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col">

                        <div class="card mb-4">
                            <div class="card-header">Détails du compte</div>
                            <div class="card-body">
                                <form>
                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Votre Identifiant :</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $userinfo['id_client']; ?>" disabled>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Votre Prénom :</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $userinfo['prenom_client']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Votre Nom :</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $userinfo['nom_client']; ?>" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Adresse postale :</label>
                                            <input class="form-control" id="inputLocation" type="text" placeholder="San Francisco, CA" value="<?php echo $userinfo['adresse_client']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Adresse mail :</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $userinfo['mail_client']; ?>" disabled>
                                    </div>

                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Numéro de téléphone (+33) :</label>
                                            <input class="form-control" id="inputLastName" type="tel" placeholder="Enter your last name" value="<?php echo $userinfo['telephone_client']; ?>" disabled>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Mot de passe (crypté) :</label>
                                            <input class="form-control" id="inputLocation" type="text" placeholder="Entrez votre mot de passe" value="<?php echo $userinfo['mdp_client']; ?>" disabled>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Réservations -->

            <div class="container-xl px-4 mt-4 rounded-sm">
                <div class="nav nav-borders">
                    <p class="nav-link active ms-0">Réservation de : <?php echo $userinfo['mail_client']; ?></a>
                </div>
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">Mes réservations</div>
                            <div class="card-body">

                                <?php

                                $servername = "localhost";
                                $username = "etang_admin";
                                $password = "driver75_";
                                $dbname = "etang_driver";

                                // Données de donnexion à la base de données

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Erreur si la connexion ne fonctionne pas

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $ids = $_SESSION['id_client'];
                                $sql = "SELECT * FROM Contrat c, Voitures v, Clients cl WHERE c.id_client = cl.id_client AND c.id_voiture = v.id_voiture AND cl.id_client = $ids";
                                $result = $conn->query($sql);

                                echo ' <section class="container-fluid section_donnees">

                            <table>';

                                while ($row = $result->fetch_assoc()) {

                                    echo "</br>";
                                    echo "<h5>Identifiant du contrat : {$row['id_contrat']}</h5>";
                                    echo "<p>Nom de la voiture : {$row['nom_voiture']}</p>";
                                    echo "<p>Prix total : {$row['prix_voiture']} €</p>";
                                    echo "<p>Date de départ : {$row['date_depart']}</p>";
                                    echo "<p>Date de retour : {$row['date_retour']}</p>";
                                    echo "<a class='btn btn-danger' href='facture.php'>Télécharger la facture</a>";
                                    echo "<hr>";
                                }

                                echo '</table>

                            </section>';

                                $conn->close();

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
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

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script src="documents/js/main.js"></script>

    </body>

    </html>
<?php
}
?>