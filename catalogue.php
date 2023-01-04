<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catalogue | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="documents/css/style.css" />
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

        <svg class="catalogue_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#000000" fill-opacity="1"
                d="M0,96L60,133.3C120,171,240,245,360,234.7C480,224,600,128,720,96C840,64,960,96,1080,133.3C1200,171,1320,213,1380,234.7L1440,256L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>

        <div id="sls" class="container section_produit filterDiv all mercedes">
            <div class="left-column">
                <img class="active" src="documents/img/sls.png" alt="" />
            </div>

            <div class="right-column">
                <div class="product-description">
                    <span>Mercedes-Benz</span>
                    <h1>Mercedes-Benz SLS AMG</h1>
                    <p>
                        La Mercedes-Benz SLS AMG est un modèle du constructeur allemand
                        Mercedes-Benz. Elle reprend les portes papillon de la 300 SL des
                        années 1950. 5000 Mercedes SLS AMG ont été produites de 2009 à
                        2015 toutes versions et modèles confondus, dont 4000 coupés et
                        1000 roadsters.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_sls" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
        </div>

        <div id="abarth" class="container section_produit filterDiv all abarth">
            <div class="right-column">
                <div class="product-description">
                    <span>Abarth & C. SpA</span>
                    <h1>Abarth 595</h1>
                    <p>
                        Découvrez l'Abarth 595 et laissez-vous piquer par la passion du
                        Scorpion. Design sportif et plaisir de conduite sont au
                        rendez-vous ! La Abarth 595 est une automobile sportive du
                        constructeur automobile italien Abarth basée sur la Fiat 500 de
                        2008.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_abarth" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
            <div class="left-column">
                <img class="active" src="documents/img/abarth.png" alt="" />
            </div>
        </div>

        <div id="r8" class="container section_produit filterDiv all audi">
            <div class="left-column">
                <img class="active" src="documents/img/spyder.jpg" alt="" />
            </div>

            <div class="right-column">
                <div class="product-description">
                    <span>Audi</span>
                    <h1>Audi R8 Spyder</h1>
                    <p>
                        La Audi R8 Spyder est une voiture de sport du constructeur
                        allemand Audi. Elle tire son nom de la voiture de course homonyme,
                        victorieuse aux 24 Heures du Mans. Le show-car Avus du salon
                        automobile de Francfort de 1991, le prototype Audi Quattro Spyder
                        ou encore le concept-car Audi Le Mans Quattro qui inaugura les
                        LED, furent les inspirateurs de la R8 de série.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_sls" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
        </div>

        <div id="x6" class="container section_produit filterDiv all bmw">
            <div class="right-column">
                <div class="product-description">
                    <span>BMW</span>
                    <h1>BMW X6</h1>
                    <p>
                        La BMW X6 de 2020 est la première automobile de type SUV coupé du constructeur automobile
                        allemand BMW.
                        La première génération est présentée au salon de Détroit 2008 et commercialisé la même année, la
                        seconde en 2014 et la troisième en 2019.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_abarth" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
            <div class="left-column">
                <img class="active" src="documents/img/x6.png" alt="" />
            </div>
        </div>

        <div id="tesla" class="container section_produit filterDiv all tesla">
            <div class="left-column">
                <img class="active" src="documents/img/tesla.png" alt="" />
            </div>

            <div class="right-column">
                <div class="product-description">
                    <span>Tesla Motors</span>
                    <h1>Tesla Model S</h1>
                    <p>
                        La Tesla Model S est une voiture de sport du constructeur
                        Tesla Motors. La Model S est une berline à cinq portes. Elle
                        est devenue le premier véhicule électrique à se hisser en tête du classement mensuel des ventes
                        d'un pays.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_sls" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
        </div>

        <div id="chiron" class="container section_produit filterDiv all bugatti">
            <div class="right-column">
                <div class="product-description">
                    <span>Bugatti</span>
                    <h1>Bugatti Chiron</h1>
                    <p>
                        La BMW X6 de 2020 est la première automobile de type SUV coupé du constructeur automobile
                        allemand BMW.
                        La première génération est présentée au salon de Détroit 2008 et commercialisé la même année, la
                        seconde en 2014 et la troisième en 2019.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_abarth" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>


            <div class="left-column">
                <img class="active" src="documents/img/chiron2.png" alt="" />
            </div>
        </div>

        <div id="rs6" class="container section_produit filterDiv all audi">
            <div class="left-column">
                <img class="active" src="documents/img/rs6png.png" alt="" />
            </div>

            <div class="right-column">
                <div class="product-description">
                    <span>Audi</span>
                    <h1>Audi RS6 Quattro</h1>
                    <p>
                        La Tesla Model S est une voiture de sport du constructeur
                        Tesla Motors. La Model S est une berline à cinq portes. Elle
                        est devenue le premier véhicule électrique à se hisser en tête du classement mensuel des ventes
                        d'un pays.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_rs6" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
        </div>

        <div id="x6" class="container section_produit filterDiv all bmw">
            <div class="right-column">
                <div class="product-description">
                    <span>Porsche</span>
                    <h1>Porsche Cayenne</h1>
                    <p>
                        La Porsche Cayenne est un SUV haut de gamme fabriqué par la firme allemande Porsche. Lancée en
                        décembre 2002 (955 puis 957 - Type 9PA), elle est renouvelée en mai 2010 (958 Type 92A) avant
                        l'arrivée de la troisième génération présentée en septembre 2017 (Type PO536) ainsi que sa
                        version Coupé.
                    </p>
                </div>

                <div class="product-price">
                    <a href="contrat.php"><button type="submit" name="res_cayenne" class="btn btn-danger test2">
                            Réserver
                        </button></a>
                </div>
            </div>
            <div class="left-column">
                <img class="active" src="documents/img/cayenne.png" alt="" />
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="documents/js/main.js"></script>
</body>

</html>