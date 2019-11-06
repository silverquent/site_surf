<?php include('header.php'); ?>



<?php include('menuAdmin.php') ?>

<div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Insere une image !</h1>
            <p class="lead"></p>
        </div>
    </div>

    <div class="container">
        <form action="postImage.php" method="POST" enctype="multipart/form-data">

            <div class="container-fluid ">
                <div class="row "
                <div class="form-group">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messagephotoBienEnvoye'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['messagephotoBienEnvoye']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <label for="titrePhoto">Titre de la image :</label>
                    <input type="text" name="titrePhoto" class="form-control" id="titrePhoto"
                           aria-describedby="emailHelp"
                           placeholder="Titre">
                </div>
                <div class="valid-form">
                    <?php
                    if (isset($_GET['messageEntrerUnTitre'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['messageEntrerUnTitre']; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">

                    <label for="descriptionPhoto">Descriptif de la image :</label>
                    <input type="text" name="descriptionPhoto" class="form-control" id="descriptionPhoto"
                           aria-describedby="emailHelp"
                           placeholder="Titre">
                </div>
                <div class="valid-form">
                    <?php
                    if (isset($_GET['messageEntrerUneDescription'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['messageEntrerUneDescription']; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>


                <div class="form-group">
                    <label for="fichierImage">Fichier image :</label>
                    <input type="file" class="form-control-file" name="fichierImage" id="fichierImage" required>
                </div>


                <button type="submit" class="btn btn btn-dark">Envoyer</button>
        </form>
    </div>
</div>
</div>

<?php include('footer.php'); ?>


