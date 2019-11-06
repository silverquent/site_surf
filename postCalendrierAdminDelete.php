<?php 

include 'config-bdd.php';


if(isset($_POST['jour'])&& (!empty($_POST['jour']))) // on vérifie que le paramètre id est fourni dans l'URL
{
    $req = $bdd->prepare('DELETE FROM creneauxdisponibles WHERE jour=:idASupprimer');
    $req->execute(array(
        'idASupprimer' => $_POST['jour'] // on récupère la valeur du parametre id depuis l'URL et on la met dans la requête
    ));
    echo "L'ID " . $_POST['jour'] . " a été supprimé.";
    header('Location: pageAdminCalendrier.php?messageSupprimerJour= Jour supprimé  !!! ');
}
else // le $_GET['id'] n'existait pas dans l'URL
{
    echo "L'ID du jeu a supprimer n'a pas été renseigné.";
    header('Location: pageAdminCalendrier.php?messageEntrerUnJour2=Selectionner un jour !!! ');
}



?>