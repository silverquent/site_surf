
<?php include 'header.php'; ?>
<body>


<!-- Formulaire de Réservation -->

<!--Partie champs -->
<div class="container-reservation">
    <div class="titreReservation">
        <h2>Récapitulatif de la réservation : </h2>
    </div>
    <!-- Envoyer le php -->



    <form action= "postPaiement.php" method="post" target="_top">
        <div id="reservationJs" class="reservation">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputte">Jour sélectionné :</label>
                    <input readonly type="text" name="jour" class="form-control" id="jourSelectionne"
                           value="<?php if (isset($_COOKIE['jourSelectionne'])) {
                               echo htmlspecialchars($_COOKIE['jourSelectionne']);
                           } ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputte" id="ancre">Créneaux :</label>
                    <input readonly type="telephone" name="creneau" class="form-control" id="creneau"
                           value="<?php if (isset($_COOKIE['creneau'])) {
                               echo htmlspecialchars($_COOKIE['creneau']);
                           } ?>">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputState">Nombre de personne :</label>
                    <input readonly type="text" name="place" class="form-control" id="place"
                           value="<?php if (isset($_COOKIE['place'])) {
                               echo htmlspecialchars($_COOKIE['place']);
                           } ?>">
                </div>
            </div>
            <!-- Cour Selectionné -->
            <div class="form-row">
                <div class="form-group col-md-58>
                    <label for=" inputState
                ">Cour selectionné :</label>
                <input readonly type="text" name="cour" class="form-control" id="cour"
                       value="<?php if (isset($_COOKIE['cour'])) {
                           echo htmlspecialchars($_COOKIE['cour']);
                       } ?>">
            </div>
        </div>
        <!-- Prix  -->
        <div class="form-row">
            <div class="form-group col-md-58>
                    <label for=" inputState
            ">Prix en euro :</label>
            <input readonly type="text" name="prix" class="form-control" id="cour"
                   value="<?php if (isset($_COOKIE['prix'])) {
                       echo htmlspecialchars($_COOKIE['prix']*$_COOKIE['place']);
                   } ?>">
        </div>
</div>
</div>
<div class="formulaire-reservation">
    <div class="container-fluid">

        <!-- Nom  -->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputpseudo"> Nom : </label>
                <input readonly type="text" name="nom" class="form-control" id="inputPseudo" placeholder="Nom :"
                       value="<?php if (isset($_COOKIE['nom'])) {
                           echo htmlspecialchars($_COOKIE['nom']);
                       } ?>">
            </div>
        </div>
        <!-- Adresse Email  -->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputMail"> Email : </label>
                <input readonly type="text" name="mail" class="form-control" id="inputMail" placeholder="Email :"
                       value="<?php if (isset($_COOKIE['mail'])) {
                           echo htmlspecialchars($_COOKIE['mail']);
                       } ?>">
            </div>
        </div>


        <!--Numero de téléphone : -->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputtel">Téléphone :</label>
                <input readonly type="telephone" name="telephone" class="form-control" id="inputtel"
                       placeholder="Télephone :" value="<?php if (isset($_COOKIE['telephone'])) {
                    echo htmlspecialchars($_COOKIE['telephone']);
                } ?>">
            </div>
        </div>


        <!--Message  -->
        <div class="form-row remplir">
            <div class="form-group col-md-8">
                <label for="inputmessage"> Message : </label>
                <div>
                    <textarea readonly type='text' class="form-control" name='message'
                              aria-label="With textarea"><?php if (isset($_COOKIE['message'])) {
                            echo htmlspecialchars($_COOKIE['message']);
                        } ?></textarea>
                </div>
            </div>


        </div>
        <br>
        <hr>
        <br>
    </div>

    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="MH3W2GWHQP3E6">
    <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
    <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">

</div>



</form>
</div>


</body>

</html>


</div>

<?php   include('footer.php') ;?>



