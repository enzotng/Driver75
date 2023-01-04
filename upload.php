<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="documents/css/admin.css">
</head>

<body>
    <main>

        <section class="section_upload">

            <?php

            // Données de donnexion à la base de données

            $conn = mysqli_connect("localhost", "etang_admin", "driver75_", "etang_driver");

            // Erreur si la connexion ne fonctionne pas
            if ($conn === false) {
                die("Erreur ! La connexion à la base de données n'a pas pu aboutir."
                    . mysqli_connect_error());
            }

            // Récupération des valeurs du formulaire
            $img = $_FILES['img']['name'];
            $imgtmp = $_FILES['img']['tmp_name'];
            $titre = $_REQUEST['titre_voiture'];
            $prix = $_REQUEST['prix'];
            move_uploaded_file($imgtmp, 'documents/img/' . $img);

            // SQL Insertion des données du formulaire
            $sql = "INSERT INTO Voitures (nom_voiture, prix_voiture, img_voiture) VALUES ('$titre', '$prix', '$img')";

            if (mysqli_query($conn, $sql)) {
                echo "<h3 style='color: white'>La voiture au nom de '$titre', au prix de '$prix' €, sera bientôt ajoutée à la BDD</h3>";
            } else {
                echo "Erreur : L'insertion des données n'a pas pu aboutir $sql. "
                    . mysqli_error($conn);
            }

            // Fermeture de la connexion
            mysqli_close($conn);
            ?>

            <a href="admin.php">Revenir sur l'espace d'administration</a>

        </section>

    </main>
</body>

</html>