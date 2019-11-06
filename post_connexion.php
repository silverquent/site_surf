<?php

session_start();

include ('config-bdd.php');

$req = $bdd->prepare('SELECT * FROM users WHERE pseudo=?');
$req->execute(array(
    $_POST['pseudo'] // le paramètre est fourni depuis le champ du formulaire
));

$resultat = $req->fetch();
// On affiche le resultat de la requete, si une ligne correspondant à la requete existe, elle va être affichée sinon c'est un false qui va s'afficher

    if($resultat !== false) // le resultat ne vaut pas false, donc il y a un utilisateur dans la BDD
    {


     if ((isset($_POST['mdp'])) && password_verify($_POST['mdp'], $resultat["mdp"]) && ($resultat[3] == 1))
     {

         $_SESSION['connecteAdmin'] = true;
         $_SESSION['pseudo'] =  $_POST['pseudo'];
         header('Location: pagePerso.php?messageconnecté=Vous etes connecté ');
         echo 'connecté comme administrateur';
         echo $resultat[3];
     }


        else if ( password_verify($_POST['mdp'], $resultat["mdp"] ) ){
            $_SESSION['connecte'] = true;
            $_SESSION['pseudo'] =  $_POST['pseudo'];
            header('Location: pagePerso.php?messageconnecté=Vous etes connecté ');
            echo 'connecté comme client';
            echo $resultat[3];



        }
        else{

          header('Location: connexion.php?message1=Mauvais mot de passe');
            echo 'Mauvais mot de passe  ';

      }


  }
    else // si le pseudo n'était pas dans la BDD
    {
        echo 'Le pseudo ' . $_POST['pseudo'] . ' n existe pas';
        header('Location: connexion.php?message=Pseudo inéxistant !!!');
    }

    ?>
