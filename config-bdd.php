<?php
//Connection à la BDD:
try{
    $bdd = new PDO('mysql:host=localhost;dbname=norelo', 'root', ''); // utilisateur root, mdp vide
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>



