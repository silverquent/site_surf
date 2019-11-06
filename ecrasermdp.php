<?php

include('bdd.php');


if($_POST['mdp1'] === $_POST['mdp2']) {

    // Si MDP1 a au moins 8 caractères
    if (strlen($_POST['mdp1']) > 8) {


        $req = $bdd->prepare('SELECT * FROM users WHERE jeton=?');
        $req->execute(array(
            $_GET['jeton']// le paramètre est fourni depuis le champ du formulaire

        ));

        $resultat = $req->fetch();
        var_dump($resultat);

        echo $resultat['id'];

        $length = 8;
        $token = bin2hex(random_bytes($length));


// on met à jour le mot de passe et on définit un nouveau jeton
        $req = $bdd->prepare('UPDATE users SET mdp=:mdp, jeton=:jeton WHERE id=:id');
        $req->execute(array(
            'mdp' => password_hash($_POST['mdp1'], PASSWORD_DEFAULT),
            'jeton' => $token,
            'id' => $resultat['id']
        ));

        $resultat = $req->fetchAll();
        var_dump($resultat);

        //echo "réinitialisation réussie";

       header('Location: connexion.php?message=mdpmaj');

    } else {

        echo "le mot de passe doit faire au moins 8 caractères";
    }
}
else {
    echo "les mots de passe sont différents";

}

?>
