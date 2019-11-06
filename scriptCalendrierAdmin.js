// Definir fonction qui affiche CLIC dans la console

function clicJour(e) {
   var texte = e.target.id;
    var texteJour = document.getElementById('jourSelectionneAdmin');
	texteJour.value= texte;

    var texte2 = e.target.id;
    var texteJour2 = document.getElementById('jourASupprimer');
    texteJour2.value= texte2;


	console.log(e.currentTarget);

afficherCommande();
focus();
}

// Ajouter gestionnaire d'evenements sur le 1er bouton
var boutonElts =document.getElementsByClassName("jourSelectionne");
for(var i =0;   i < boutonElts.length ; i++){
    boutonElts[i].addEventListener("click", clicJour);
}


function bascule(id)
{
    if (document.getElementById(id).style.visibility == "hidden")
        document.getElementById(id).style.visibility = "visible";
    else	document.getElementById(id).style.visibility = "hidden";
}


focusScrollMethod = function getFocus() {
    document.getElementById("ajouter").focus({preventScroll:false});
}
focusScrollMethod = function getFocus() {
    document.getElementById("supprimer").focus({preventScroll:false});
}






