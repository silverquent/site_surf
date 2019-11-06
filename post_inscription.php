<?php
include('config-bdd.php');
$herderAdresse = 'inscription';

if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse email  est considérée comme valide.";
    echo '<br>';
    $reqMail = $bdd->prepare('SELECT * FROM users WHERE mail=? ');
    $reqMail->execute(array(
        $_POST['mail'],

    ));


    $resultatMail = $reqMail->fetch();
    if ($resultatMail != false) //  Afficher Mail déjà utilisé
    {
        echo "Mail deja utilisé ";
        header('Location: inscription.php?messageMailDejaUtilisé=Mail déjà utilisé ');
    }

//Si champs pseudo non vide
    if ((isset($_POST['pseudo'])) && (!empty($_POST['pseudo']))) {
        echo " pseudo bien entré";
        echo '<br>';


        if ((isset($_POST['mdp'])) && (!empty($_POST['mdp']))) {
            echo " mdp bien entré";
            echo '<br>';

            if ((isset($_POST['cmdp'])) && (!empty($_POST['cmdp']))) {
                echo " mdp bien entré";
                echo '<br>';

                //Si MDP1 == MDP2
                if ($_POST['mdp'] === $_POST['cmdp']) {
                    echo " identique";
                    echo '<br>';


                    // Si MDP1 a au moins 8 caractères
                    if (strlen($_POST['mdp']) > 8) {

                        // Si MDP1 contient un chiffre
                        if (preg_match('/\d/', $_POST['mdp']) == true) {
                            // Si PSEUDO déjà présent dans la BDD


                            $req = $bdd->prepare('SELECT * FROM users WHERE pseudo=? ');
                            $req->execute(array(
                                $_POST['pseudo'],

                            ));
                            $resultat = $req->fetch();
                            if ($resultat != false) //  Afficher Pseudo déjà utilisé
                            {
                                echo "Pseudo déjà utilisé";
                                header('Location: inscription?messagepseudoutilisé=Pseudo déjà utilisé ');

                                // Si Pseudo pas entré
                                if (!empty($_POST['pseudo'])) {
                                    echo 'bien';
                                } else {
                                    header('Location: inscription?messagepasdepseudo=Pseudo a entrer ');
                                }
                            } else {

                                // Insérer dans la BDD PSEUDO et hash de MDP1
                                $req = $bdd->prepare('INSERT INTO users(ID, pseudo, mdp, mail ,admin) VALUES (NULL, :pseudo, :mdp ,:mail , default )');
                                $req->execute(array(
                                    'pseudo' => htmlspecialchars($_POST['pseudo']),
                                    'mail' => htmlspecialchars($_POST['mail']),
                                    'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT)

                                ));

                                echo ($_POST['pseudo']) . '<br>';
                                echo($_POST['mdp']);


                                // Afficher Inscription faite
                                echo 'Inscription faite';
                                header('Location: pagePerso?messageinscription=inscription faite');
                            }

                        } else // Afficher Le mot de passe doit contenir un chiffre
                        {
                            echo "Le mot de passe doit contenir un chiffre";
                            header('Location: inscription?messagechiffre=Le mot de passe doit contenir un chiffre');
                        }

                    } else // Afficher Mot de passe trop court
                    {
                        echo "Mot de passe trop court";
                        header('Location: inscription?messagecourt=Mot de passe trop court');
                    }
                } else // Afficher Mots de passe differents
                {
                    echo "Mots de passe differents";
                    header('Location: inscription.php?messagedif=Mot de passe différent !!!!!');
                    ;
                }

            } else {
                header('Location:  inscription.php?message=Mot de passe différent !!!!!');
                echo 'entrer un cmdp';
            }
        } else {
            header('Location:  inscription.php?message=Mot de passe différent !!!!!');
            echo 'entrer un mdp';
        }

    } else {
        header('Location:  inscription.php?messageEntrerUnPseudo=Entrer un pseudo !!!!!');
        echo 'entrer unn pseusdo';
    }

}
else
    {
        header('Location:  inscription.php?messageAdresseNonValide=Adresse non valide  !!!!!');
        echo 'entrer une adresse valide ';
}


?>