<body>


<?php

//On se connecte à la BDD:
include 'config-bdd.php';

$moisok = 0;
$anneeok = 0;
$j = 0;
if (isset($_GET['mois']) && isset($_GET['annee'])) {
    $moistest = array ('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
    foreach ($moistest as $moisseul){
        if ($_GET['mois'] === $moisseul){
            $moisok = 1;
            break;
        }
    }
    $anneetest = $_GET['annee'];
    $i = 0;
    while ($i < strlen($anneetest)){
        $asciiletter = ord($anneetest{$i});
        if ($asciiletter >= 48 && $asciiletter <= 57){
            $j++;
        }
        $i++;
    }
    if ($j === 4 && strlen($anneetest) === 4){
        $anneeok = 1;
    }


    if ($moisok === 1 && $anneeok === 1){
        $moisAAfficher = htmlspecialchars($_GET['mois']);
        $anneeAAfficher = htmlspecialchars(($_GET['annee']));
    }
    else if($moisok === 0 || $anneeok === 0){
        $moisAAfficher = date('n');
        $anneeAAfficher = date('Y');
    }
}
else {
    $moisAAfficher = date('n');
    $anneeAAfficher = date('Y');
}


$anneePrecedente = $anneeAAfficher - 1;
$moisPrecedent = $moisAAfficher - 1;
$moisSuivant = $moisAAfficher + 1;
$mois_fr = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
$semaine = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$joursDansLeMois = cal_days_in_month(CAL_GREGORIAN, $moisAAfficher, $anneeAAfficher);
$premierDuMois = mktime(0, 0, 0, $moisAAfficher, 1, $anneeAAfficher);


if ($moisPrecedent == 0) {
    $moisPrecedent = 12;
}
if ($moisSuivant > 12) {
    $moisSuivant = 1;
}
?>



<?php

echo '<div class="container" >';
echo '<div class="row justify-content-center>';
echo '<nav class="   ">	</nav>';

echo '<div class="table-responsive">';
echo '<table class="table table-bordered">';
echo '<thead class="bg-primary  ">';
echo '<tr>';
echo '<th  scope="row" id="btnleft" >  <a   class="btn btn-alert alert-light"  href=reservation.php?annee=';
if ($moisAAfficher == 1) // on est en janvier
{
    echo $anneeAAfficher - 1;
} else {
    echo $anneeAAfficher;
}
echo '&mois=';
echo $moisPrecedent;
echo ' > < </a>  </th>';
echo '<th scope="row" class="titreMois align-middle" colspan=5>';
echo $anneeAAfficher . " " . $mois_fr[$moisAAfficher - 1];
echo '</th><th  scope="row"id="btnright" ><a  class="btn btn-alert alert-light" href=reservation.php?annee=';

if ($moisAAfficher == 12) // on est en décembre
{
    echo $anneeAAfficher + 1;
} else {
    echo $anneeAAfficher;
}
echo '&mois=';
echo $moisSuivant;
echo '>></a></th></tr></thead>';

echo '<thead class="thead-light"><tr>';


//Afficher les jours de la semaine sur une ligne
foreach ($semaine as $jour) {
    echo '<th >' . $jour . '</th>';
}
echo '</tr></thead>';
echo '<tbody><tr> ';

//Mise en place du premier jour dans le mois :
for ($i = 1; $i < date('N', $premierDuMois); $i++) {
    echo '<td></td>';
}
//Afficher les numéros du jours
for ($i = 0; $i < $joursDansLeMois; $i++) {

    // crée une date avec le jour du 1er du mois actuel
    $jour = mktime(0, 0, 0, $moisAAfficher, 1 + $i, $anneeAAfficher);
    $nbrJourDansLaSemaine = date('w', $jour);

    echo '<td id="';
    //Permet d'afficher le 0 pour les mois inférieurs à 10
    if ($moisAAfficher < 10) {
        echo $anneeAAfficher . '-' . "0" . $moisAAfficher . '-' . date("d", $jour);
        $idDateJour = $anneeAAfficher . '-' . "0" . $moisAAfficher . '-' . date("d", $jour);
    } else {
        echo $anneeAAfficher . "-" . $moisAAfficher . "-" . date("d", $jour);
        $idDateJour = $anneeAAfficher . "-" . $moisAAfficher . "-" . date("d", $jour);

    }
    $resultatRequete = $bdd->prepare('SELECT * FROM creneauxdisponibles WHERE jour=:jour');
    $resultatRequete->execute(array('jour' => $idDateJour));
    $resultatRequete = $resultatRequete->fetchAll();
    if (isset($resultatRequete[0]) && isset($resultatRequete[0]['creneau2']) && isset($resultatRequete[0]['creneau3'])) {
        if ($resultatRequete[0]['creneau1'] === 0 && $resultatRequete[0]['creneau2'] === 0 && $resultatRequete[0]['creneau3'] === 0) {
            $color = 'red';
        } else if ($resultatRequete[0]['creneau1'] > 0 || $resultatRequete[0]['creneau2'] > 0 || $resultatRequete[0]['creneau3'] > 0) {
            $color = '#00C851';
        }
    } else {
        $color = 'grey';
    }
    echo '"class="jourSelectionne"> ';
    echo '<div class="titreNumeroJour" style="background-color: ' . $color . '!important;">';
    echo date("d", $jour);
    echo '</div>';
    echo '<div>';


    if (isset($resultatRequete[0])) {

        echo "<ul><li id='Créneau1' class='creneauSelectionne'>Créneau :" . ' ' . $resultatRequete[0]['creneau1'] . "</li><li  id='Créneau2'class='creneauSelectionne'>Créneau :" . ' ' . $resultatRequete[0]['creneau2'] . "</li><li id='Créneau3' class='creneauSelectionne'>Créneau : " . ' ' . $resultatRequete[0]['creneau3'] . "</li></ul>";
    } else {
        echo "<ul><li id='Créneau1' class='creneauSelectionne'></li><li  id='Créneau2'class='creneauSelectionne'></li><li id='Créneau3' class='creneauSelectionne'></li></ul>";

    }
    echo '</div>';

    echo "</td> ";
    if ($nbrJourDansLaSemaine == 0) {
        echo '</tr><tr>';
    }

}

echo '</tr>';

echo ' </tbody></table></div>';

?>
<?php
echo '</div></div>';
?>

<!-- LEGENDE -->


<div class="container mt-4 mb-4">
    <div class="row justify-content-start">
        <div class="row ml-1" style="">
            <span style="background-color: #00C851 ;width: 1.5rem ;height: 1.5rem ">  </span>
            : Disponible
        </div>
        <div class="row ml-1 pl-3">
            <span class="" style=" background-color: #ff4444 ;width: 1.5rem ;height: 1.5rem ">  </span>
            : Réservé
        </div>
        <div class="row ml-1 pl-3">
            <span class=" " style="background-color: #848484;width: 1.5rem ;height: 1.5rem ">  </span>
            : Pas de cours
        </div>
    </div>
</div>


<div class="container">
    <div class="form-row">
        <button   onclick="bascule('ajouter'); focusNoScrollMethod()" type="submit" class="btn btn-blue" data-toggle="tooltip" data-placement="left">Ajouter jours
        </button>
    </div>
    <div class="form-row">
        <button   onclick="bascule('supprimer');" type="submit" class="btn btn-blue" data-toggle="tooltip" data-placement="left">Ajouter jours
        </button>
    </div>


</div>



<!-- Formulaire Ajout jours  -->


<div id="ajouter" class="container  mb-5 mt-5 pt-3 white">
    <!-- Envoyer le php -->
    <form action="postCalendrierAdmin.php" method="POST" enctype="multipart/form-data">
        <div class="form-row justify-content-center text-center ">
            <h2>Enregistrement Jours : </h2>
        </div>
        <div  class="form-row justify-content-center">
            <div class="form-row ">
                <div class="form-group justify-content-center text-center ">
                    <label for="inputte">Jour sélectionné :</label>
                    <input readonly type="text" name="jour" class="form-control" id="jourSelectionneAdmin">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageEntrerUnJour'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messageEntrerUnJour']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageDateDejaUtilisee'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messageDateDejaUtilisee']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageBienEnregistrer'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['messageBienEnregistrer']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid d-flex justify-content-lg-around">
                <div class="form-row selectMaDroit">
                    <div class="form-group col-lg-12">
                        <label for="inputState"> Créneau 1 :</label>
                        <select id="inputState" name="creneau1" class="form-control">
                            <option selected>Choisir...</option>
                            <option> 0</option>
                            <option> 1</option>
                            <option> 2</option>
                            <option> 3</option>
                            <option> 4</option>
                            <option> 5</option>
                            <option> 6</option>
                            <option> 7</option>
                            <option> 8</option>
                        </select>
                    </div>
                </div>
                <div class="form-row selectMaMilieu">
                    <div class="form-group col-lg-12">
                        <label for="inputState"> Créneau 2 :</label>
                        <select id="inputState" name="creneau2" class="form-control">
                            <option selected>Choisir...</option>
                            <option> 0</option>
                            <option> 1</option>
                            <option> 2</option>
                            <option> 3</option>
                            <option> 4</option>
                            <option> 5</option>
                            <option> 6</option>
                            <option> 7</option>
                            <option> 8</option>
                        </select>
                    </div>
                </div>
                <div class="form-row selectMaGauche">
                    <div class="form-group col-lg-12">
                        <label for="inputState"> Créneau 3 :</label>
                        <select id="inputState" name="creneau3" class="form-control">
                            <option selected>Choisir...</option>
                            <option> 0</option>
                            <option> 1</option>
                            <option> 2</option>
                            <option> 3</option>
                            <option> 4</option>
                            <option> 5</option>
                            <option> 6</option>
                            <option> 7</option>
                            <option> 8</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="valid-form">
                <?php
                if (isset($_GET['messageEntrerCreneaux'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['messageEntrerCreneaux']; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- Bouton -->
        <div class="form-row justify-content-center">
            <button type="submit" class="btn btn-blue" data-toggle="tooltip" data-placement="left">Entrer jour
            </button>
        </div>
    </form>
</div>


<!-- Formulaire Supprimer jours  -->
<div id="supprimer" class="container white mb-5 mt-5 pt-3">
    <div class="form-row justify-content-center text-center">
        <form action="postCalendrierAdminDelete.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <h2>Supprimer jour</h2>
            </div>
            <div class="form-row ">
                <div class="form-group  ">
                    <label for="inputte">Jour sélectionné :</label>
                    <input readonly type="text" name="jour" class="form-control" id="jourASupprimer">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageSupprimerJour'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['messageSupprimerJour']; ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Bouton -->
            <div class="form-row justify-content-center">
                <button type="submit" class="btn btn-blue" data-toggle="tooltip" data-placement="left">Entrer jour
                </button>
            </div>
        </form>
    </div>
</div>









<script type="text/javascript" src="scriptCalendrierAdmin.js"></script>
