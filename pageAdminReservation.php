<?php include('header.php'); ?>



<?php include('menuAdmin.php') ?>


<div class="container mb-5 mt-5">
    <div class="row justify-content-center">

        <?php
        include('config-bdd.php');
        $reqTout = $bdd->query('SELECT * FROM  rdv');
        $resultaTout = $reqTout->fetchAll();


        ?>
        <table class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <form action="postSupprimerImage.php" method="POST" enctype="multipart/form-data">
                    <thead class=" bg-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOM </th>
                        <th scope="col">TELEPHONE</th>
                        <th scope="col">MAIL</th>
                        <th scope="col">DATE</th>
                        <th scope="col">CREANEAU</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">MESSAGE</th>
                        <th scope="col">SELECTION</th>
                    </tr>
                    </thead>


                    <tbody>

                    <?php

                    foreach ($resultaTout as $ligne) {
                        ; ?>
                        <tr>
                            <th class="blue"> <?php echo $ligne['ID']; ?> </th>
                            <th class="white"> <?php echo $ligne['nom']; ?> </th>
                            <th class="white"> <?php echo 0 . $ligne['telephone']; ?> </th>
                            <th class="white"> <?php echo $ligne['mail']; ?> </th>
                            <th class="white"> <?php echo $ligne['jour']; ?> </th>
                            <th class="white"> <?php echo $ligne['creneau']; ?> </th>
                            <th class="white"> <?php echo $ligne['place']; ?> </th>
                            <th class="white"> <?php echo $ligne['message']; ?> </th>
                            <th class="white">
                                <input type="checkbox" name="imprimer[]" value="<?php echo $ligne['ID']; ?>">
                            </th>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <thead class=" bg-primary">
                    <tr>
                        <th scope="col" colspan="9">
                            <button type="submit" class="btn btn btn-blue">IMPRIMER
                            </button>
                        </th>

                    </tr>
                    </thead>

                </form>
            </table>
        </table>


    </div>
</div>


<?php include('footer.php'); ?>


