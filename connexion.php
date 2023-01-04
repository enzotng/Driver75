<?php
session_start();

//Variables nécessaire à la connexion à la base donnée
$servername = 'localhost';
$username = 'etang_admin';
$password = 'driver75_';

//On établit la connexion
$db = new PDO("mysql:host=$servername;dbname=etang_driver", $username, $password);

if(isset($_POST['btnConnexion'])) {
  $mailconnect = ($_POST['mailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $db->prepare("SELECT * FROM Clients WHERE mail_client = ? AND mdp_client = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_client'] = $userinfo['id_client'];
         header("Location: profil.php?id_client=".$_SESSION['id_client']);
      } else {
         $erreur = "Mauvais e-mail ou mot de passe !";
      }
  } else {
      $erreur = "Tous les champs doivent être complétés !";
  }
}

// //Variables nécessaire à la connexion à la base donnée
// $servername = 'localhost';
// $username = 'etang_admin';
// $password = 'driver75_';
// $compteur = 0;

// //On établit la connexion
// $db = new PDO("mysql:host=$servername;dbname=etang_driver", $username, $password);

// //On sélectionne la table utilisateur dans notre base de données, on prépare la requête puis on l'éxécute
// $sql = "SELECT * FROM Clients";
// $result = $db->prepare($sql);
// $result->execute();

// //Si l'utilisateur appuie sur le bouton connexion
// if (isset($_POST['btnConnexion'])) {
//     //On récupère les valeurs du formulaire
//     $email = $_POST['mailconnect'];
//     $pass = $_POST['mdpconnect'];
//     //On parcourt la table
//     while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
//         //On verifie que l'email et le mot de passe decrypté correspondent
//         if ($ligne['mail_client'] == $email and password_verify($pass, $ligne['mdp_client'])) {
//             // On ouvre la session
//             session_start();

//             // On enregistre le login en session
//             $_SESSION['mailconnect'] = $email;
//             $_SESSION['mdpconnect'] = $pass;
//             //Redirection vers une page différente du même dossier
//             header("Location: profil.php");
//             exit();
//         } else {
//             //Sinon on affiche le mot de passe incorrect
//             echo "<script>alert(\"Mot de passe ou identifiant incorrect\")</script>";
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Driver75</title>

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
        
                <section class="section_connexion">
                    <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="user_card">
                                <div class="d-flex justify-content-center">
                                    <div class="brand_logo_container">
                                        <img src="documents/img/logo2.png" class="brand_logo" alt="Logo">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center form_container">
                                    <form method="POST" action="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                            </div>
                                            <input type="email" name="mailconnect" class="form-control input_user" placeholder="Email">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            </div>
                                            <input type="password" name="mdpconnect" class="form-control input_pass" placeholder="Mot de passe">
                                        </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <input type="submit" name="btnConnexion" class="btn login_btn" value="Se connecter" />
                                    </div>
                                   <p class="mt-4 text-center"><a class="a_connexion" href="inscription.php" class="ml-2">Créer un compte ?</a></p>
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
                  <form action="mail.php" id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post"
                     name="validation">
                     <div class="form-group">
                        <label>Nom* :</label>
                        <input type="text" id="name" name="name" required class="form-control" minlength="1" maxlength="20" />
                        <label>Email* :</label><span id="info"></span>
                        <input type="email" id="email" name="email" required class="form-control" minlength="1" maxlength="30"
                           placeholder="examplemail.fr" />
                        <label>Message* :</label>
                        <textarea onKeyPress="if(event.keyCode == 13) validerForm();" id="message" name="message" required
                           class="form-control" minlength="1" maxlength="200"></textarea>
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
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="documents/js/main.js"></script>

</body>

</html>