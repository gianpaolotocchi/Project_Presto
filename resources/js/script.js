
// Funzione per nascondere il messaggio di errore dopo 5 secondi
setTimeout(function() {
   let flashMessage = document.getElementById('flash-message');
   if (flashMessage) {
   flashMessage.style.display = "none";
   }
}, 5000); // 5 secondi in millisecondi

