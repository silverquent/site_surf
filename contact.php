<?php

include('header.php');


?>


    <p class="h4 mb-5 mt-5  text-center">CONTACTEZ-NOUS</p>
    <div class="container ">
        <div class="  row  mt-5  mb-5 justify-content-center  ">
            <div class=" col-lg-6 col-sm-12">
                <!-- Default form contact -->
                <form action="postContact.php" method="POST" class="text-center  ">


                    <!-- Name -->
                    <input type="text" class="form-control mb-4  " placeholder="Nom"
                           name="nom"
                           value="<?php if (isset($_COOKIE['nom'])) {
                               echo htmlspecialchars($_COOKIE['nom']);
                           } ?>">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messagePasdenom'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messagePasdenom']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Mail -->
                    <input type="email" name="mail" class="form-control mb-4"
                           placeholder="E-mail" value="<?php if (isset($_COOKIE['mail'])) {
                        echo htmlspecialchars($_COOKIE['mail']);
                    } ?>">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messagemauvaiseAdresse'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messagemauvaiseAdresse']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Téléphone -->
                    <input type="text" name="telephone" class="form-control mb-4"
                           placeholder="Téléphone" value="<?php if (isset($_COOKIE['telephone'])) {
                        echo htmlspecialchars($_COOKIE['telephone']);
                    } ?>">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messagemauvaistéléphone'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messagemauvaistéléphone']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Objet -->
                    <input type="text" name="objet" class="form-control mb-4"
                           placeholder="Objet:"  value="<?php if (isset($_COOKIE['objet'])) {
                        echo htmlspecialchars($_COOKIE['objet']);
                    } ?>" >
                    <div class="valid-form">
                    <?php
                    if (isset($_GET['messagepasdobjet'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['messagepasdobjet']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <!-- Message -->
                    <div class="form-group">
                        <textarea name="message" class="form-control rounded-0" id="exampleFormControlTextarea2"
                                  rows="3"
                                  placeholder="Message"></textarea>
                    </div>
                    <?php
                    if (isset($_GET['messagepasdemessage'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['messagepasdemessage']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['messageEnvoyé'])) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['messageEnvoyé']; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Send button -->
                    <div class="g-recaptcha    " data-sitekey="6LdFfKcUAAAAAIn1SzXb_21pi3sTwK0-CzOB2SAG"></div>

                    <button class="btn btn-lg btn-primary " value="valider" type="submit" id="valider">Envoyer</button>
                </form>
            </div>

            <!--Grid column-->
            <div class="col-md-3 mt-5% text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>France OLERON</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 01 234 567 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>norelosurfschool@gmail.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
    </div>


    <!--Google map-->
    <div id="map-container-google-1" class="z-depth-1-half map-container">
        <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
    </div>

    <!--Google Maps-->





    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php include('footer.php'); ?>