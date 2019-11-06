<?php
session_start();
include('config-bdd.php');

var_dump($_POST['supprimer']);

if ((isset($_POST['supprimer']) && (!empty($_POST['supprimer']) ))){

        $reqSupprimer = $bdd->prepare('DELETE FROM images WHERE id=:idASupprimer');
        $reqSupprimer->execute(array(
            'idASupprimer' => $_POST['supprimer'][0]
    // on récupère la valeur du parametre id depuis l'URL et on la met dans la requête
        ));

        header('location: pageAdminPhoto.php?message' );


}
else {
    echo'pas supprimé';
}
 ?>








