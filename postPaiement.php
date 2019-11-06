<?php


include ('config-bdd.php');




if ($_POST['creneau'] === "Créneau1") {
    $reqCreneau = $bdd->prepare('SELECT creneau1 FROM creneauxdisponibles WHERE jour=?');
    $reqCreneau->execute(array(
        $_POST['jour']));
    $resultatReservation = $reqCreneau->fetchAll();

    if ($resultatReservation[0]['creneau1'] < $_POST['place']) {
        include('cookie/cookieSauvegarde.php');
        header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');

    }
    if ($resultatReservation[0]['creneau1'] >= $_POST['place']) {

        if (isset($_POST['creneau']) && ($_POST['creneau'] == 'Créneau1')){
            $reqCreneau = $bdd->prepare('SELECT creneau1 FROM creneauxdisponibles WHERE jour=?');
            $reqCreneau->execute(array(
                $_POST['jour']));
            $resultatReservation = $reqCreneau->fetchAll();
            $soustraction = $resultatReservation[0]['creneau1']- $_POST['place'] ;
            echo  $soustraction;



            $reqSoustraction = $bdd->prepare('UPDATE creneauxdisponibles SET creneau1=? WHERE jour=?');
            $reqSoustraction->execute(array(
                htmlspecialchars($soustraction),
                htmlspecialchars($_POST['jour'])

            ));

            $reqclient = $bdd->prepare('INSERT INTO clients(idClients, nom, telephone, mail)
VALUES (NULL, :nom , :telephone, :mail, )');
            $req->execute(array(
                'nom' =>  htmlspecialchars($_POST['nom']),
                'telephone' =>  htmlspecialchars($_POST['telephone']),
                'mail' =>  htmlspecialchars($_POST['mail'])
            ));

            $reqIdClient = $bdd->->prepare('SELECT * FROM clients WHERE idClient=?');
            $reqclient->execute(array())

            $reqCreneau = $bdd->prepare('SELECT creneau1 FROM creneauxdisponibles WHERE jour=?');
            $reqCreneau->execute(array(
                $_POST['jour']));
            $resultatReservation = $reqCreneau->fetchAll();


            reqfacture= $bdd->prepare('INSERT INTO reservation(idReservations, idCLient ,jour, creneau, place, message , cour , prix )
VALUES (NULL, :nom , :telephone, :mail, :jour, :creneau, :place, :message , :cour, :prix)');
            $req->execute(array(
                                'jour' => htmlspecialchars($_POST['jour']),
                'creneau' =>  htmlspecialchars($_POST['creneau']),
                'place' =>  htmlspecialchars($_POST['place']),
                'message' =>  htmlspecialchars($_POST['message']),
                'cour' => htmlspecialchars($_POST['cour']),
                'prix' => htmlspecialchars($_POST['prix'])
            ));
            header('Location: reservation.php?messageCommandeValdie= Commande Enregistrée   ');
        }

    }}
/*

else if ($_POST['creneau'] === "Créneau2") {
    $reqCreneau = $bdd->prepare('SELECT creneau2 FROM creneauxdisponibles WHERE jour=?');
    $reqCreneau->execute(array(
        $_POST['jour']));
    $resultatReservation = $reqCreneau->fetchAll();

    if ($resultatReservation[0]['creneau2'] < $_POST['place']) {
        include('cookie/cookieSauvegarde.php');
        header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');

    }
    if ($resultatReservation[0]['creneau2'] >= $_POST['place']) {

        if (isset($_POST['creneau']) && ($_POST['creneau'] == 'Créneau2')){
            $reqCreneau = $bdd->prepare('SELECT creneau2 FROM creneauxdisponibles WHERE jour=?');
            $reqCreneau->execute(array(
                $_POST['jour']));
            $resultatReservation = $reqCreneau->fetchAll();
            $soustraction = $resultatReservation[0]['creneau2']- $_POST['place'] ;
            echo  $soustraction;



            $reqSoustraction = $bdd->prepare('UPDATE creneauxdisponibles SET creneau2=? WHERE jour=?');
            $reqSoustraction->execute(array(
                htmlspecialchars($soustraction),
                htmlspecialchars($_POST['jour'])

            ));

            $req = $bdd->prepare('INSERT INTO rdv(ID, nom, telephone, mail, jour, creneau, place, message , cour , prix )
VALUES (NULL, :nom , :telephone, :mail, :jour, :creneau, :place, :message , :cour, :prix)');
            $req->execute(array(
                'nom' =>  htmlspecialchars($_POST['nom']),
                'telephone' =>  htmlspecialchars($_POST['telephone']),
                'mail' =>  htmlspecialchars($_POST['mail']),
                'jour' => htmlspecialchars($_POST['jour']),
                'creneau' =>  htmlspecialchars($_POST['creneau']),
                'place' =>  htmlspecialchars($_POST['place']),
                'message' =>  htmlspecialchars($_POST['message']),
                'cour' => htmlspecialchars($_POST['cour']),
                'prix' => htmlspecialchars($_POST['prix'])


            ));
            header('Location: reservation.php?messageCommandeValdie= Commande Enregistrée   ');
        }

    }}
else if ($_POST['creneau'] === "Créneau3") {
    $reqCreneau = $bdd->prepare('SELECT creneau3 FROM creneauxdisponibles WHERE jour=?');
    $reqCreneau->execute(array(
        $_POST['jour']));
    $resultatReservation = $reqCreneau->fetchAll();

    if ($resultatReservation[0]['creneau3'] < $_POST['place']) {
        include('cookie/cookieSauvegarde.php');
        header('Location: reservation.php?messagenombreDePlaceInvalide= Nombre de place insuffisant  ');

    }
    if ($resultatReservation[0]['creneau3'] >= $_POST['place']) {

        if (isset($_POST['creneau']) && ($_POST['creneau'] == 'Créneau3')){
            $reqCreneau = $bdd->prepare('SELECT creneau3 FROM creneauxdisponibles WHERE jour=?');
            $reqCreneau->execute(array(
                $_POST['jour']));
            $resultatReservation = $reqCreneau->fetchAll();
            $soustraction = $resultatReservation[0]['creneau3']- $_POST['place'] ;
            echo  $soustraction;



            $reqSoustraction = $bdd->prepare('UPDATE creneauxdisponibles SET creneau3=? WHERE jour=?');
            $reqSoustraction->execute(array(
                htmlspecialchars($soustraction),
                htmlspecialchars($_POST['jour'])

            ));

            $req = $bdd->prepare('INSERT INTO rdv(ID, nom, telephone, mail, jour, creneau, place, message , cour , prix )
VALUES (NULL, :nom , :telephone, :mail, :jour, :creneau, :place, :message , :cour, :prix)');
            $req->execute(array(
                'nom' =>  htmlspecialchars($_POST['nom']),
                'telephone' =>  htmlspecialchars($_POST['telephone']),
                'mail' =>  htmlspecialchars($_POST['mail']),
                'jour' => htmlspecialchars($_POST['jour']),
                'creneau' =>  htmlspecialchars($_POST['creneau']),
                'place' =>  htmlspecialchars($_POST['place']),
                'message' =>  htmlspecialchars($_POST['message']),
                'cour' => htmlspecialchars($_POST['cour']),
                'prix' => htmlspecialchars($_POST['prix'])


            ));
            header('Location: reservation.php?messageCommandeValdie= Commande Enregistrée   ');
        }

    }}



*/

?>