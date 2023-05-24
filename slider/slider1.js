// Attendre que le DOM soit entièrement chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionner l'élément conteneur du carousel
  var photosWrapper = document.querySelector('.carousel');
  // Sélectionner toutes les images du carousel
  var photos = document.querySelectorAll('img');
  // Largeur d'une photo en unités de vue (vw)
  var photoWidth = 31;
  // Sélectionner les boutons de défilement gauche et droit
  var btnDecaleGauche = document.querySelector('.swipe-left');
  var btnDecaleDroite = document.querySelector('.swipe-right');

  // Variables de positionnement
  var position = 0; // Position actuelle
  var minPosition = 0; // Position minimale
  var maxPosition = photos.length - 3; // Position maximale

  // Fonction pour décaler le carousel vers la gauche
  function decaleGauche() {
    console.log("hello")
    position++;
    if (position > maxPosition) {
      // Si la position dépasse la position maximale, revenir au début du carousel
      position = -1;
      // Supprimer la transition pour un mouvement instantané
      photosWrapper.style.transition = 'none';
      photosWrapper.style.left = '0';
      // Utiliser setTimeout pour rétablir la transition après un court délai
      setTimeout(function () {
        photosWrapper.style.transition = 'left 0.5s ease-in-out';
        decaleGauche();
      }, 20);
    } else {
      // Ajuster la position du carousel pour montrer la photo actuelle
      photosWrapper.style.left = -position * photoWidth + "vw";
    }
  }

  // Fonction pour décaler le carousel vers la droite
  function decaleDroite() {
    position--;
    console.log("right")
    if (position < minPosition) {
      // Si la position est inférieure à la position minimale, revenir à la fin du carousel
      position = maxPosition;
      // Supprimer la transition pour un mouvement instantané
      photosWrapper.style.transition = 'none';
      photosWrapper.style.left = -position * photoWidth + "vw";
      // Utiliser setTimeout pour rétablir la transition après un court délai
      setTimeout(function () {
        photosWrapper.style.transition = 'left 0.5s ease-in-out';
        decaleDroite();
      }, 20);
    } else {
      // Ajuster la position du carousel pour montrer la photo actuelle
      photosWrapper.style.left = -position * photoWidth + "vw";
    }
  }

  // Déclencher automatiquement le défilement vers la gauche toutes les 5 secondes
  setInterval(decaleGauche, 5000);

  // Ajouter des écouteurs d'événements aux boutons de défilement gauche et droit
  btnDecaleGauche.addEventListener('click', decaleGauche);
  btnDecaleDroite.addEventListener('click', decaleDroite);
});

