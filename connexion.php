<?php include('header.php');
include ('bdd/url.php') ;
?>


    <!-- Default form login -->
        <div class="formulaireConnexion">
    <form action="post_connexion.php" method="POST" enctype="multipart/form-data" class="text-center border border-light p-5">

        <p class="h4 mb-4">Connexion</p>

        <!-- PSEUDO -->
        <input type="pseudp" name="pseudo" id="defaultLoginFormPseudo" class="form-control mb-4" placeholder="Pseudo">

        <!-- MOT DE PASSE -->
        <input type="password" name="mdp" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Mot de passe ">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Mot de passe oublié?</a>
            </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

        <!-- Register -->
        <p>Not a member?
            <a href="">Register</a>
        </p>



    </form>
        </div>
    <!-- Default form login -->
<?php include('footer.php'); ?>