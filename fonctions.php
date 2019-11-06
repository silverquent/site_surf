<?php

$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
}


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>


