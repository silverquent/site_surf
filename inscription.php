<?php include('header.php'); ?>


<?php
if (isset($_GET['messagedeco'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_GET['messagedeco']; ?>
    </div>
    <?php
}
?>

<!--PARTIE JUMBOTRON TITRE PAGE -->

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Inscription !</h1>
        <p class="lead">Inscrivez vous pour partager vos souvenir et vos expériences : </p>
    </div>

</div>

<div class="formulaireInscription">
    <!-- Default form register -->
    <form action="post_inscription.php" method="post" enctype="multipart/form-data" class="text-center border border-light p-5">

        <p class="h4 mb-4" style="background-color: #0b51c5">Sign up</p>

        <div class="form-row mb-4">
            <div class="col">
                <!-- PSEUDO-->
                <input type="text" name="pseudo" id="defaultRegisterFormFirstName" class="form-control" placeholder="Pseudo">
            </div>
            <div class="valid-form">
                <?php
                if (isset($_GET['messagepseudoutilisé'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['messagepseudoutilisé']; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col">
                <!-- MAIL -->
                <input type="text" name="mail" id="defaultRegisterFormLastName" class="form-control" placeholder="Mail">
            </div>


        </div>
        <div class="valid-form">
            <?php
            if (isset($_GET['messageAdresseNonValide'])) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['messageAdresseNonValide']; ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <!-- MOT DE PASSE  -->
                <input type="password" name="mdp" id="defaultRegisterFormFirstName" class="form-control" placeholder="Mot de passe">
            </div>
            <div class="col">
                <!-- CONFIRMATION MOT DE PASSE -->
                <input type="password" name="cmdp" id="defaultRegisterFormLastName" class="form-control" placeholder="Confirmation mot de passe">
            </div>

        </div>






        <!-- Newsletter -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
        </div>

        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Demande d'inscription</button>



        <hr>

        <!-- Terms of service -->
        <p>By clicking
            <em>Sign up</em> you agree to our
            <a href="" target="_blank">terms of service</a>

    </form>
    <!-- Default form register -->
</div>
<?php include('footer.php'); ?>
