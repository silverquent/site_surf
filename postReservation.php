<?php
//Mettre en place le isset pour les post
//Si Nom est non nul

if ( (isset($_POST['nom'])) && (!empty($_POST['nom'])))
{

echo '<br>';


//Si Mail correct.
if ((isset($_POST['mail'])) && ((filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)))) {
    echo "L'adresse email  est considérée comme valide.";
    echo $_POST['place'];

    //Si téléphone valide.
    if (!empty($_POST['telephone']) && preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone'])) {
        echo '<br>';
        echo 'numéro ok';


            if (!empty($_POST['jour'])) {
                echo '<br>';
                echo 'jour ok';
                echo '<br>';

                if ((!empty($_POST['place'])) && (is_numeric($_POST['place'])))
                {
                    if((isset($_POST['cour']))&& (!empty($_POST['cour'])))
                    {


// On se connecte à la BDD
                        // On se connecte à la BDD


                        include 'config-bdd.php';

                        $reservationok = 0;
                        if ($_POST['creneau'] === "Créneau3") {
                            $reqCreneau = $bdd->prepare('SELECT creneau3 FROM creneauxdisponibles WHERE jour=?');
                            $reqCreneau->execute(array(
                                $_POST['jour']));
                            $resultatReservation = $reqCreneau->fetchAll();
                            echo $_POST['jour'] . '<br>';
                            echo $resultatReservation[0]['creneau3'] . '<br>';


                            if ($resultatReservation[0]['creneau3'] < $_POST['place']) {
                                include('cookie/cookieSauvegarde.php');
                                header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');

                            }
                            if ($resultatReservation[0]['creneau3'] >= $_POST['place']) {
                                header('Location: paiement.php?  ');
                                $reservationok = 1;
                                include('cookie/cookieSauvegarde.php');

                            }
                        } else if ($_POST['creneau'] === "Créneau2") {
                            $reqCreneau = $bdd->prepare('SELECT creneau2 FROM creneauxdisponibles WHERE jour=?');
                            $reqCreneau->execute(array(
                                $_POST['jour']));
                            $resultatReservation = $reqCreneau->fetchAll();
                            echo $_POST['jour'] . '<br>';
                            echo $resultatReservation[0]['creneau2'];

                            if ($resultatReservation[0]['creneau2'] < $_POST['place']) {
                                include('cookie/cookieSauvegarde.php');
                                header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');
                            }

                            if ($resultatReservation[0]['creneau2'] >= $_POST['place']) {
                                header('Location: paiement.php?  ');
                                include('cookie/cookieSauvegarde.php');
                                $reservationok = 1;
                                echo $reservationok;
                            }
                        } else if ($_POST['creneau'] === "Créneau1") {
                            $reqCreneau = $bdd->prepare('SELECT creneau1 FROM creneauxdisponibles WHERE jour=?');
                            $reqCreneau->execute(array(
                                $_POST['jour']));
                            $resultatReservation = $reqCreneau->fetchAll();
                            echo $_POST['jour'] . '<br>';
                            echo $resultatReservation[0]['creneau1'];
                            if ($resultatReservation[0]['creneau1'] < $_POST['place']) {
                                include('cookie/cookieSauvegarde.php');
                                header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');
                            }

                            if ($resultatReservation[0]['creneau1'] >= $_POST['place']) {

                                header('Location: paiement.php?  ');
                                include('cookie/cookieSauvegarde.php');
                                $reservationok = 1;
                            }

                        }
                    }

                    else
                        {
                            header('Location: reservation.php?messageEntreUnCour=Entrer un cour  !!!');
                            include('cookie/cookieSauvegarde.php');
                        }
                }
                    else
                        {
                        header('Location: reservation.php?messageEntreUnNombreDePersonne=Entrer un nombre de personne  !!!');
                            include('cookie/cookieSauvegarde.php');
                    }

                } else {
                    header('Location: reservation.php?messageEntreUnJour=Entrer un Jour et un Créneau !!!');
                include('cookie/cookieSauvegarde.php');
                }


        } //Si le téléphone n'est pas valide.
        else {
            header('Location: reservation.php?messagemauvaistéléphone=Mauvais numéro de téléphone!!! ');
            include('cookie/cookieSauvegarde.php');


        }
    } // Si l'adresse mail n'est pas valide.
    else {
        header('Location: reservation.php?messagemauvaiseAdresse=Mail non valide !!! ');
        include('cookie/cookieSauvegarde.php');



    }
} // Si l'adresse mail n'est pas valide.
else {

    header('Location: reservation.php?messagePasDeNom=Entrer un nom !!! ');
    include('cookie/cookieSauvegarde.php');


}


?>
