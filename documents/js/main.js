document.addEventListener("DOMContentLoaded", function () {
    
  // Fonction compteur de mots pour le formulaire de contact

  function compteur_texte(texte) {
    var restants = 250 - texte.length;
    document.getElementById("message_restants").innerHTML = restants;
  }

  // Fonction qui submit les données du formulaire de contact

  function validerForm() {
    document.getElementById("form").submit();
  }
});

// Activation de JQuery

$(document).ready(function () {
    
  // Initialisation de AOS (Animation au scroll)

  AOS.init();

  $("btn_reservation").click(function () {
    $("#reservations").toggle();
  });

  // Ce script permet d'afficher le formulaire de contact, situé en bas à gauche

  $("#formulaire .body").hide();
  $("#formulaire .button").click(function () {
    $(this).next("#formulaire div").slideToggle(400);
    $(this).toggleClass("expanded");
  });
});
