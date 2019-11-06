<?php
session_start();
include('config-bdd.php');



$infosNomFichier = pathinfo($_FILES['fichierImage']['name']);
var_dump($infosNomFichier);

var_dump($infosNomFichier['filename']);

var_dump($_FILES['fichierImage']['name']);

$extension = $infosNomFichier['extension'];
$taillePhoto = pathinfo($_FILES['fichierImage']['size']);
$extensionAutorisees = array("png", "gif", "jpg", "jpeg", "tiff");

$tmpName = $_FILES['fichierImage']['tmp_name'];

echo $extension ;


var_dump($taillePhoto);


if (isset($_FILES['fichierImage']) && (!empty($_FILES['fichierImage']))) {
    echo 'contient un fichier ';
    echo '<br>';


    if (isset($_FILES['fichierImage']) && $_FILES['fichierImage']['error'] == 0) {
        echo 'il n\'y a pas d erreure ';
        echo '<br>';
        if (in_array(strtolower($extension), $extensionAutorisees) === true) {
            echo 'bonne extension';
            echo '<br>';
            if ($_FILES['fichierImage']['size'] < 1000000) {
                echo 'bonne taille ';
                echo '<br>';
                if ((isset($_POST['descriptionPhoto'])) && (!empty($_POST['descriptionPhoto']))) {
                if ((isset($_POST['titrePhoto']))&& (!empty($_POST['titrePhoto']))) {

                    // Insérer dans la titre et description
                    $req = $bdd->prepare('INSERT INTO images(id, titre, description, extension) VALUES (NULL, :titre, :description ,:extension)');
                    $req->execute(array(
                        'titre' => htmlspecialchars($_POST['titrePhoto']),
                        'description' => htmlspecialchars($_POST['descriptionPhoto']),
                        'extension' => $extension
                    ));

                            $idDernierElementInsere = $bdd->LastInsertId();
                            $direction = 'upload/imagesAdmin/' . "photoAdmin" .$idDernierElementInsere. "." . $extension;
                            (move_uploaded_file($tmpName, $direction));
                            echo $idDernierElementInsere;




                            echo 'enregistré ';
                           //header('Location: pageAdminPhoto.php?messagephotoBienEnvoye=Photo bien envoyé!!');

                    } else {
                        echo 'entré une desceription';
                        header('Location: pageAdminPhoto.php?messageEntrerUnTitre=Entrer un titre!!');
                    }
                }
                else{
                    echo'entré un titre ';
                    header('Location: pageAdminPhoto.php?messageEntrerUneDescription=Entrer une description!!');
                }
            }
            else
                {
                    echo 'dd';
                }

            }
            else {
                echo 'mauvaise extension  ';
                echo '<br>';

            }


        }
        else {
            echo 'il y a une erreure ';
        }


    }
    else {
        echo 'pas de fichier';
    }

    ?>