<?php

include ('config-bdd.php');

$bdd->exec ('UPDATE norelo SET prix WHERE id=2 ');
echo"ligne inseréee";


?>
