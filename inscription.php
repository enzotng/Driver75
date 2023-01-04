<?php
$bdd = new PDO('mysql:host=localhost;dbname=etang_driver', 'etang_admin', 'driver75_');

if (isset($_POST['btnInscription'])) {
    $mail = $_POST['mail'];
    $mail2 = $_POST['mail2'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone =$_POST['telephone'];
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    if (!empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2']) and !empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['adresse']) and !empty($_POST['telephone'])) {

        if ($mail == $mail2) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM Clients WHERE mail_client = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    if ($mdp == $mdp2) {
                        $insertmbr = $bdd->prepare("INSERT INTO Clients (nom_client, prenom_client, mail_client, adresse_client, telephone_client, mdp_client) VALUES(?, ?, ?, ?, ?, ?)");
                        $insertmbr->execute(array($nom, $prenom, $mail, $adresse, $telephone, $mdp));
                        $erreur = "Compte crée avec succès !". header('Location: https://driver.etang.velizy-mmi.o2switch.site/connexion.php');
                        exit();
                    } else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                } else {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            } else {
                $erreur = "Votre adresse mail n'est pas valide !";
            }
        } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                            <form method="POST" action="">
                                <form class="form-group" method="POST" action="">

                                    <div class="form-group">
                                        <label>Nom* :</label>
                                        <input type="text" class="form-control" placeholder="Votre nom" id="nom"
                                            name="nom" minlength="3" maxlength="30" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Prénom* :</label>
                                        <input type="text" class="form-control" placeholder="Votre prénom" id="prenom"
                                            name="prenom" minlength="3" maxlength="30" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Mail* :</label>
                                        <input type="email" class="form-control" required placeholder="exemple@mail.fr" id="mail"
                                            name="mail" value="<?php if (isset($mail)) {echo $mail;} ?>" />
                                            <small class="small_inscription">(Votre e-mail sera votre nom d'utilisateur)</small>
                                    </div>

                                    <div class="form-group">
                                        <label">Confirmation du mail* :</label>
                                            <input type="email" class="form-control" required placeholder="Confirmez votre mail"
                                                id="mail2" name="mail2"
                                                value="<?php if (isset($mail2)) {echo $mail2;} ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label">Adresse postale* :</label>
                                            <input type="text" class="form-control" placeholder="Votre adresse postale"
                                                id="adresse" name="adresse" minlength="10" maxlength="70" required />
                                    </div>

                                    <div class="form-group">
                                        <label">Numéro de téléphone* :</label>
                                            <input type="tel" class="form-control"
                                                placeholder="Votre numéro de téléphone" id="telephone"
                                                name="telephone" maxlength="10" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Mot de passe* (4 caractères minimum) :</label>
                                        <input type="password" class="form-control" placeholder="Votre mot de passe"
                                            id="mdp" name="mdp" minlength="4" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Confirmation du mot de passe* :</label>
                                        <input class="form-control" type="password" placeholder="Confirmez votre mot de passe"
                                            id="mdp2" name="mdp2" minlength="4" required />
                                    </div>
                                    <p class="formulaire-texte">* Champs obligatoires</p>
                                    <input class="btn login_btn" type="submit" name="btnInscription"
                                        value="S'inscrire" />
                                    <input class="btn login_btn" type="reset" name="btnReset" value="Réinitialiser"
                                        onclick="window.location.reload();" />
                                </form>
                        </div>
                        <?php
                            if(isset($erreur)) {
                               echo '<font class="text-center" color="red">'.$erreur."</font>";
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
                    <form action="mail.php" id="form" enctype="multipart/form-data" onsubmit="return validate()"
                        method="post" name="validation">
                        <div class="form-group">
                            <label>Nom* :</label>
                            <input type="text" id="name" name="name" required class="form-control" minlength="1"
                                maxlength="20" />
                            <label>Email* :</label><span id="info"></span>
                            <input type="email" id="email" name="email" required class="form-control" minlength="1"
                                maxlength="30" placeholder="examplemail.fr" />
                            <label>Message* :</label>
                            <textarea onKeyPress="if(event.keyCode == 13) validerForm();" id="message" name="message"
                                required class="form-control" minlength="1" maxlength="200"></textarea>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="documents/js/main.js"></script>

</body>

</html>