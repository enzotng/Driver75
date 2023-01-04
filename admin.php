<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="documents/css/admin.css">
</head>

<body>
    <main>
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
        
        <section class="section_generale">


            <div class="container-fluid">
                <div class="rounded">
                    <div class="row img_accueil">
                        <img id="accueil" src="documents/img/logo2.png" alt="Logo">
                        <h1 class="titre_generale_white" data-aos-delay="500" data-aos-duration="2500" data-aos="fade-in">
                            Bienvenue sur votre espace d'administration</h1>
                    </div>
                </div>

                <form action="" method="post" class="formulaire">
                    <h2 class="titre_generale_black">Que
                        souhaitez-vous faire ?</h2>
                    
                    <input class="form-check-input" type="radio" name="form" id="afficher" value="Afficher_Clients" required>
                    <label>Afficher les clients</label>
                    
                    <input class="form-check-input" type="radio" name="form" id="afficher" value="Afficher_Reservations" required>
                    <label>Afficher les réservations</label>
                    
                    <input class="form-check-input" type="radio" name="form" id="afficher" value="Afficher_Voitures" required>
                    <label>Afficher les voitures</label>
                    
                    <input class="form-check-input" type="radio" name="form" id="inserer" value="Insérer" required>
                    <label>Ajouter des voitures</label>
                    
                    <input class="form-check-input" type="radio" name="form" id="supprimer" value="Supprimer" required>
                    <label>Supprimer des voitures</label>
                    
                    <button class="btn button" type="reset" name="btnReset" id="reset" onClick="window.location.reload();">Réinitaliser</button>
                    <button class="btn button" type="submit" name="submit" id="valider">Valider</button>
                    <button onclick="window.location.href='https://driver.etang.velizy-mmi.o2switch.site/';" class="btn button" type="submit" name="btnAccueil" id="btnAccueil">Revenir à l'accueil</button>
                </form>
                
                <?php

                if (isset($_POST["submit"])) {
                    if (isset($_POST["form"])) {
                        $radiocheck = $_POST['form'];
                        if ($radiocheck == "Afficher_Clients") {
                            
                            $servername = "localhost";
                            $username = "etang_admin";
                            $password = "driver75_";
                            $dbname = "etang_driver";

                            // Données de donnexion à la base de données
                            
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Erreur si la connexion ne fonctionne pas
                            
                            if ($conn->connect_error) {
                                die("Connexion ratée !: " . $conn->connect_error);
                            }

                            // FORMULAIRE AFFICHER LES CLIENTS

                            $sql = "SELECT * FROM Clients";
                            $result = $conn->query($sql);

                            echo ' <section class="container-fluid section_donnees">

                            <h1 class="titre_generale">Nos clients Driver75</h1>
                            
                            <table>
                            
                            <a href="admin.php">Revenir en arrière</a>';

                            while ($row = $result->fetch_assoc()) {

                                echo "</br>";
                                echo "<h5>Identifiant du client : {$row['id_client']}</h5>";
                                echo "<p>Nom du client : {$row['nom_client']}</p>";
                                echo "<p>Prénom du client : {$row['prenom_client']}</p>";
                                echo "<p>Année postale du client : {$row['adresse_client']}</p>";
                                echo "<p>Numéro de téléphone du client : +33 {$row ['telephone_client']}</p>";
                                echo "<hr style='border: 1px solid black'>";
                            }

                            echo '</table>

                            </section>';

                            $conn->close();
                            
                             } else if ($radiocheck == "Afficher_Reservations") {

                            $servername = "localhost";
                            $username = "etang_admin";
                            $password = "driver75_";
                            $dbname = "etang_driver";

                            // Données de donnexion à la base de données
                            
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Erreur si la connexion ne fonctionne pas
                            
                            if ($conn->connect_error) {
                                die("Connexion ratée !: " . $conn->connect_error);
                            }


                            // FORMULAIRE AFFICHER LES RESERVATIONS

                            $sql = "SELECT * FROM Contrat c, Voitures v, Clients cl WHERE c.id_client = cl.id_client AND c.id_voiture = v.id_voiture;";
                            $result = $conn->query($sql);
                            
                            echo ' <section class="section_donnees">

                            <h1 class="titre_generale">Réservations</h1>
                            
                            <table>
                            
                            <a href="admin.php">Revenir en arrière</a>';

                            while ($row = $result->fetch_assoc()) {

                                echo "</br>";
                                echo "<h5>Identifiant du contrat : {$row['id_contrat']}</h5>";
                                echo "<p>Nom du client : {$row['nom_client']}</p>";
                                echo "<p>Prénom du client : {$row['prenom_client']}</p>";
                                echo "<p>Téléphone du client : +33 (0) {$row['telephone_client']}</p>";
                                echo "<p>Date de départ : {$row ['date_depart']}</p>";
                                echo "<p>Date de retour : {$row['date_retour']}</p>";
                                echo "<p>Nom de la voiture : {$row['nom_voiture']}</p>";
                                echo "<p>Prix de la réservation : {$row['prix_voiture']} €</p>";


                                foreach ($row as $indice => $row1) {

                                    if ($indice == "img_voiture") {
                                        $fichier = $row['img_voiture'];
                                        echo "<img style='width: 20% !important' class='img_affichage' src='documents/img/$fichier' alt='Image'/>";
                                    }
                                }
                                echo "<hr style='border: 1px solid black'>";
                            }

                            echo '</table>

                            </section>';

                            $conn->close();

                        } else if ($radiocheck == "Afficher_Voitures") {
                        
                        // FORMULAIRE AFFICHER LES VOITURES
                        
                            $servername = "localhost";
                            $username = "etang_admin";
                            $password = "driver75_";
                            $dbname = "etang_driver";

                            // Données de donnexion à la base de données
                            
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Erreur si la connexion ne fonctionne pas
                            
                            if ($conn->connect_error) {
                                die("Connexion ratée !: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM Voitures";
                            $result = $conn->query($sql);

                            echo ' <section class="section_donnees">

                            <h1 class="titre_generale">Nos voitures Driver75</h1>
                            
                            <table>
                            
                            <a href="admin.php">Revenir en arrière</a>';

                            while ($row = $result->fetch_assoc()) {

                                echo "</br>";
                                echo "<h5>Identifiant de la voiture : {$row['id_voiture']}</h5>";
                                echo "<p>Nom de la voiture : {$row['nom_voiture']}</p>";
                                echo "<p>Prix de la voiture : {$row['prix_voiture']} €</p>";


                                foreach ($row as $indice => $row1) {

                                    if ($indice == "img_voiture") {
                                        $fichier = $row['img_voiture'];
                                        echo "<p>Nom de l'image : {$row['img_voiture']}</p>";
                                        echo "<img style='width: 20% !important' class='img_affichage' src='documents/img/$fichier' alt='Image'/>";
                                    }
                                }
                                echo "<hr style='border: 1px solid black'>";
                            }

                            echo '</table>

                            </section>';

                            $conn->close();

                            // FORMULAIRE INSERER

                        } else if ($radiocheck == "Insérer") {

                            echo ' <form action="upload.php" method="post" class="form-group" enctype="multipart/form-data">
        
            <h1 class="titre_generale">Ajouter une voiture</h1>
            <a href="https://driver.etang.velizy-mmi.o2switch.site/">Revenir en arrière</a>

        <div class="form-group">
            <label for="titre">Nom de la voiture</label>
            <input type="text" name="titre_voiture" class="form-control" id="titre_voiture" aria-describedby="emailHelp" placeholder="Veuillez insérer le nom de la voiture..." required maxlength="45">
        </div>
        
        <div class="form-group">
            <label for="titre">Prix de location</label>
            <input type="number" name="prix" class="form-control" id="prix" placeholder="100€" maxlength="5">
        </div>
        
        <div class="form-group">
            <label for="titre">Image de la voiture</label>
            <input type="file" name="img" class="form-control" id="img" aria-describedby="emailHelp" required maxlength="45" onChange={onImageChange} className="filetype">
        </div>
        
      <button class="btn button" type="reset" name="btnReset" id="reset">Réinitaliser</button>
      <button class="btn button" type="submit" name="submit" id="valider">Valider</button>
      </form>
        ';
        
        // FORMULAIRE SUPPRIMER
        
                        } else if ($radiocheck == "Supprimer") {
                            echo '<script language="Javascript">
                            document.location.replace("supprimer.php");
                            </script>';
                        }
                    }
                }

                ?>
        </section>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="documents/js/main.js"></script>

</body>

</html>