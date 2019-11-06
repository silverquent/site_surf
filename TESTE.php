<!-- Formulaire de Réservation -->


<!--Partie champs -->
<div class="container white mb-5 mt-5">
    <form action="postReservation.php" method="POST" enctype="multipart/form-data">
        <!--Titre -->
        <div class="form-row justify-content-center text-center  ">
            <h1> Formulaire Réservation </h1>
        </div>

        <!--Champs à remplir manuellement -->
        <div class="">
            <!-- Nom  -->
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputpseudo"> </label>
                    <input type="text" name="nom" class="form-control" id="inputPseudo"
                           placeholder="Nom :"
                           value="<?php if (isset($_COOKIE['nom'])) {
                               echo htmlspecialchars($_COOKIE['nom']);
                           } ?>">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messagePasDeNom'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messagePasDeNom']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Adresse Email  -->
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputMail"> </label>
                    <input type="text" name="mail" class="form-control" id="inputMail"
                           placeholder="Email :"
                           value="<?php if (isset($_COOKIE['mail'])) {
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
                </div>
            </div>
            <!--Numero de téléphone : -->
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputtel"></label>
                    <input type="telephone" name="telephone" class="form-control" id="inputtel"
                           placeholder="Télephone :" value="<?php if (isset($_COOKIE['telephone'])) {
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
                </div>
            </div>
            <!--Message  -->
            <div class="form-row remplir">
                <div class="form-group col-md-8">
                    <label for="inputmessage"></label>
                    <div>
                                <textarea type='text' placeholder="Message :" class="form-control" name='message'
                                          aria-label="With textarea"><?php if (isset($_COOKIE['message'])) {
                                        echo htmlspecialchars($_COOKIE['message']);
                                    } ?></textarea>
                    </div>


                </div>
                <div class="valid-form">
                    <?php
                    if (isset($_GET['messagenombreDePlaceInvalide'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['messagenombreDePlaceInvalide']; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="valid-form">
                    <?php
                    if (isset($_GET['messageCommandeValdie'])) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['messageCommandeValdie']; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- champs à selectionner : -->
        <div class="">
            <!-- titre -->
            <div>

                <p>Sélectionner le jour et le crénau dans le calendrier: </p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputte">Jour sélectionné :</label>
                    <input readonly type="text" name="jour" class="form-control" id="jourSelectionne"
                           value="<?php if (isset($_COOKIE['jourSelectionne'])) {
                               echo htmlspecialchars($_COOKIE['jourSelectionne']);
                           } ?>">
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageEntreUnJour'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messageEntreUnJour']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputte" id="ancre">Créneaux :</label>
                    <input readonly type="telephone" name="creneau" class="form-control" id="creneau"
                           value="<?php if (isset($_COOKIE['creneau'])) {
                               echo htmlspecialchars($_COOKIE['creneau']);
                           } ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="inputState">Nombre de personne :</label>
                    <select id="inputState" name="place" class="form-control"
                            value="<?php if (isset($_COOKIE['place'])) {
                                echo htmlspecialchars($_COOKIE['place']);
                            } ?>">
                        <option selected> <?php if (!isset($_COOKIE['place'])) {
                                echo 'Choisir...';
                            } else if (isset($_COOKIE['place'])) {
                                echo htmlspecialchars($_COOKIE['place']);
                            }
                            ?></option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                    </select>
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageEntreUnNombreDePersonne'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messageEntreUnNombreDePersonne']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <?php
                $reqPrix = $bdd->query('SELECT * FROM tarifs ');
                $resultatPrix = $reqPrix->fetchAll();
                ?>
                <div class="form-group col-md-9">
                    <label for="inputState">Selectionner cours :</label>
                    <select id="inputState" name="cour" class="form-control"
                            value="<?php if (isset($_COOKIE['cour'])) {
                                echo htmlspecialchars($_COOKIE['cour']);
                            } ?>">
                        <option selected> <?php if (!isset($_COOKIE['cour'])) {
                                echo 'Choisir...';
                            } else if (isset($_COOKIE['cour'])) {
                                echo htmlspecialchars($_COOKIE['cour']);
                            }
                            ?>
                        </option><?php
                        foreach ($resultatPrix as $Prix) {
                            echo '<option>' . $Prix['typecour'] . ' ' . $Prix['prix'] . ' ' . '€' . '</option>';
                        }
                        ?>
                    </select>
                    <div class="valid-form">
                        <?php
                        if (isset($_GET['messageEntreUnCour'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['messageEntreUnCour']; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- Bouton -->
        <button class="btn btn-lg btn-primary justify-content-center " type="submit">Demande
            de Réservation
        </button>
    </form>
</div>



