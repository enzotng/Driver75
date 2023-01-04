<?php
$conn = mysqli_connect("localhost", "etang_admin", "driver75_", "etang_driver");

if (!$conn) {

    die('Erreur de connexion ! :' . mysql_error());
}
// Données de donnexion à la base de données

// Si le bouton supprimer est actionné, alors on supprimera les données demandées par l'utilisateur.
// Pour ce faire, il faut donc récupérer l'ID Formulaire de chaque donnée pour ensuite supprimer ce dernier.

if (isset($_POST['supprimer'])) {
    $checkbox = $_POST['check'];
    for ($i = 0; $i < count($checkbox); $i++) {
        $id_form = $checkbox[$i];
        mysqli_query($conn, "DELETE FROM Voitures WHERE id_voiture='" . $id_form . "'");
        $notif = "Données supprimées avec succès !";
    }
}

// Sélectionne toutes les données de la table Voitures
$result = mysqli_query($conn, "SELECT * FROM Voitures");
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer | Driver75</title>

    <link href="documents/img/logo_accueil.png" rel="icon" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="documents/css/admin.css">
</head>

<body>
    <form method="post" action="" class="formulaire_supprimer">
        <table class="table">
            <thead>
                <tr>
                    <th>Sélectionner une case :</th>
                    <th>Nom de la voiture :</th>
                    <th>Prix de la voiture / jour :</th>
                    <th>Photo de la voiture :</th>
                </tr>
            </thead>
            <?php

            // Variable I qu'on définit à 0

            $i = 0;

            // Récupération des données, donc affichage dans une table

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id_voiture"]; ?>"></td>
                    <td><?php echo $row["nom_voiture"]; ?></td>
                    <td><?php echo $row["prix_voiture"]; ?> €</td>
                    <?php

                    foreach ($row as $indice => $row1) {

                        if ($indice == "img_voiture") {
                            $fichier = $row['img_voiture'];
                            echo "<td style='text-align: center; vertical-align: middle; width:30%'><img style='width: 20% !important' class='img_affichage' src='documents/img/$fichier' alt='Image'/></td>";
                        }
                    }
                    ?>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
        <a href="https://driver.etang.velizy-mmi.o2switch.site/admin.php"><button class="btn button" type="submit" name="btnReset" id="reset">Réinitaliser</button></a>
        <button class="btn button" type="submit" name="supprimer" id="supprimer">Supprimer</button>
        <a href="index.html" <button class="btn button" type="submit" name="accueil" id="accueil">Accueil</button></a>

        <!-- Echo si on a réussi à supprimer les données de la table-->
        <div><?php if (isset($notif)) {
                    echo $notif;
                } ?>
        </div>

    </form>
</body>

</html>