
/*------------------------------*\
            $Reservation
\*------------------------------*/




// Definir fonction qui affiche CLIC dans la console
function clicDansConsole(e) {
    var texte = e.target.parentNode.parentNode.parentNode.id;
    var texteJour = document.getElementById('jourSelectionne');
    texteJour.value= texte;

    var texte2 = e.target.id;
    var texteCreaneau = document.getElementById('creneau');
    texteCreaneau.value=texte2;

}

// Ajouter gestionnaire d'evenements sur le 1er bouton
var boutonElts =document.getElementsByClassName("creneauSelectionne");
console.log(boutonElts);
for(var i =0;   i < boutonElts.length ; i++){
    boutonElts[i].addEventListener("click", clicDansConsole);
}






