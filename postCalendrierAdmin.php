<?php 
//Mettre en place le isset pour les post 
//Si Nom est non nul


if ((isset($_POST['jour']))&& (!empty($_POST['jour'])))
{
    echo '<br>';
    echo 'numéro ok' .$_POST['jour'];

    if((isset($_POST['creneau1']))&& (!empty($_POST['creneau1'])) && (is_numeric($_POST['creneau1']) ))
    {
        echo '<br>'. 'numéro ok' .$_POST['creneau1'];


        if((isset($_POST['creneau2']))&& (!empty($_POST['creneau2'])) && (is_numeric($_POST['creneau2']) ))
        {
            echo '<br>' . 'numéro ok' . $_POST['creneau2'];

            if((isset($_POST['creneau3']))&& (!empty($_POST['creneau3'])) && (is_numeric($_POST['creneau3']) ))
            {
                echo '<br>' . 'numéro ok' . $_POST['creneau3'];


                // On se connecte à la BDD
                include 'config-bdd.php';
                $reqJour = $bdd->prepare('SELECT * FROM creneauxdisponibles WHERE jour=?');
                $reqJour->execute(array(
                    $_POST['jour']));
                $resultatJour = $reqJour->fetch();

                if ($resultatJour != false) //  Afficher Pseudo déjà utilisé
                {
                    header('Location: pageAdmincCalendrier.php?messageDateDejaUtilisee=Date déjà utilisée !!! ');
                    echo "<br>  Date déjà utilisé";
                    $valeurCookieJour = $_POST['jour'];
                    setcookie("place",$valeurCookieJour,time() + 60 * 60, null, null, false, true);
                }
                else
                    {
                    // Insérer dans la BDD : le nom , le numéro de téléphone
                    // l'objet et le message .
                    $req = $bdd->prepare('INSERT INTO creneauxdisponibles(ID, jour, creneau1, creneau2, creneau3 )
 VALUES (NULL, :jour, :creneau1, :creneau2, :creneau3)');
                    $req->execute(array(
                        'jour' => htmlspecialchars($_POST['jour']),
                        'creneau1' => htmlspecialchars($_POST['creneau1']),
                        'creneau2' => htmlspecialchars($_POST['creneau2']),
                        'creneau3' => htmlspecialchars($_POST['creneau3'])
                    ));
                    header('Location: pageAdminCalendrier.php?messageBienEnregistrer=Créneaux bien enregistrés !!! ');
                }

            }
    else
    {
        header('Location: pageAdminCalendrier.php?messageEntrerCreneaux=Selectionner les 3 créneaux !!! ');
        echo'pas de creneau 1  ';
    }
    }
    else
    {
        header('Location: pageAdminCalendrier.php?messageEntrerCreneaux=Selectionner les 3 créneaux !!! ');
        echo'pas de creneau 1  ';
    }
}
else
{
    header('Location: pageAdminCalendrier.php?messageEntrerCreneaux=Selectionner les 3 créneaux !!! ');
    echo'pas de creneau 1  ';
}

}
else
{
    header('Location: pageAdminCalendrier.php?messageEntrerUnJour=Selectionner un jour !!! ');
    echo'pas de jour  ';
}

?>