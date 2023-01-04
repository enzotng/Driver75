 <?php

$to = "enzotang@live.fr"; // Email de réception
$from = "message@etang.velizy-mmi.o2switch.site"; // Adresse email du destinataire de l'envoi, celui rattaché au domaine.

// Ne pas modifier les lignes ci-dessous

$JOUR = date("Y-m-d");  // Jour de l'envoi de l'email
$HEURE = date("H:i"); // Heure d'envoi de l'email
$name = $_POST["name"]; // Nom de la personne
$email = $_POST["email"]; // Email de la personne
$message = $_POST["message"]; // Message de la personne

$Subject = "Nouveau message - Driver75 ($JOUR $HEURE)";
$mail_Data .= " Nom : $name \n";
$mail_Data .= " Adresse mail de la personne : $email \n";
$mail_Data .= "\n Corps du message : $message \n";

$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=utf-8 \n";
$headers .= "De: $from  \n";
$headers .= "Disposition-Notification-To: $from  \n";

   // Message de Priorité haute
   // -------------------------
   $headers .= "X-Priority: 1  \n";
   $headers .= "X-MSMail-Priority: High \n";

   $CR_Mail = TRUE;

   $CR_Mail = @mail ($to, $Subject, $mail_Data, $headers);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location de voitures | Driver75</title>

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
        <main>   
            <div id="accueil" class="section_mail">
                <div class="overlay-itro">
                </div>
                    <div class="accueil-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                      <?php
                                        if ($CR_Mail === FALSE)   
                                        echo " Erreur, votre message ne s'est pas bien envoyé \n";
                                   else                      
                                        echo " Votre mail a bien été envoyé ! \n";
                                ?>
                                    <br/>
                              <button class="btn login_btn hover_a" style="color: white !important"><a href="https://driver.etang.velizy-mmi.o2switch.site/">Revenir à l'accueil</button></a>
                            </div>
                        </div>
                    </div>
            </div>
        </main>
    </body>
</html>