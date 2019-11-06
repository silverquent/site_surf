
<?php

include('header.php');


?>


<div class="container">
    <div class="newmdp">
        <div class="titre">
            <h1>Mot de passe oublié</h1>
            <br>
            <p style="text-align: center"> Entrer votre pseudo et votre adresse e-mail pour recevoir le mail qui permettra de réinitialiser votre mot de passe  </p>
            <br>


        </div>



        <div class="row justify-content-md-center">
            <form action="gestionnouveaumdp.php" method="post" enctype="multipart/form-data">

                <div class="form-label-group">
                    <label for="inputEmail">Pseudo</label>
                    <input type="text" id="textpseudo" name="pseudo" class="form-control"
                           placeholder="Pseudo"
                           required autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse e-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="E-mail">

                </div>




                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                        type="submit">Envoyer</button>


            </form>

        </div>
    </div>
</div>




<?php
include('footer.php');

?>