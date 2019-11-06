<?php include('header.php'); ?>


<body>

<div class="container mt">

    <?php // On se connecte à la BDD
    include 'config-bdd.php';
    $reqId = $bdd->query('SELECT * FROM  images ');
    $resultatId = $reqId->fetchAll();
    ?>

    <div class="row mt-5 mb-5">
        <?php foreach ($resultatId

        as $ligne){ ?>
        <div class="col-sm-12 col-md-6 mb-5">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ligne['titre']; ?></h5>
                    <p class="card-text"> <?php echo $ligne['description']; ?></p>

                </div>
                <img src="upload/imagesAdmin/photoAdmin<?php echo $ligne['id'] .'.'.$ligne['extension'] ?>"
                     height="300px"
                     width="100%">
            </div>
        </div>


<?php } ?>
</div>
</div>
</body>


?>
<footer>
    <?php include('footer.php'); ?>
</footer>

