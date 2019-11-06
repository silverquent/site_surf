<?php session_start(); ?>

<a href="#" onclick="document.cookie='cookiebar=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/'; setupCookieBar(); return false;"></a>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="style.css" rel="stylesheet">
    <link href="styleMenu.css" rel="stylesheet">
</head>

<header>

    <div class="imgBackground">

    </div>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark blue-gradient">
        <a class="navbar-brand" href="#">Norelo </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil 
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Les moniteurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos valeurs</a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="tarifs.php">Tarifs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pagePhotos.php">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservation.php">Réservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <?php
                if (isset($_SESSION['connecteAdmin']) && $_SESSION['connecteAdmin'] == true) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo $_SESSION['pseudo']; ?> </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                         aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="pagePerso.php">Profil</a>
                        <a class="dropdown-item" href="pageAdminCalendrier.php">Administrateur</a>
                        <a class="dropdown-item" href="post_deonnexion.php" data-toggle="modal" data-target="#toto">Déconnexion</a>
                    </div>
                </li>

                <?php
                }

                else if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <?php echo $_SESSION['pseudo']; ?> </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                             aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="pagePerso.php">Profil</a>
                            <a class="dropdown-item" href="post_deonnexion.php" data-toggle="modal" data-target="#toto">Déconnexion</a>
                        </div>
                    </li>


                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                             aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalScrollable">Connexion</a>

                            <a class="dropdown-item" href="inscription.php">Inscription</a>

                        </div>
                    </li>

                <?php } ?>


            </ul>
        </div>
    </nav>
    <!--/.Navbar -->


    <!-- Modal -->

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <!-- Card -->
                    <div class="card">

                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Material form register -->
                            <form action="post_connexion.php" method="POST">
                                <p class="h4 text-center py-4">CONNEXION</p>

                                <!-- Material input text -->
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="materialFormCardNameEx" class="form-control" name="pseudo">
                                    <label for="materialFormCardNameEx" class="font-weight-light">Pseudo</label>
                                </div>


                                <!-- Material input password -->
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="materialFormCardPasswordEx" class="form-control"
                                           name="mdp">
                                    <label for="materialFormCardPasswordEx" class="font-weight-light">Mot de
                                        passe</label>
                                    <a href="nouveauMotDePasse.php"> Mot de passe oubblié ? </a>
                                </div>

                                <div class="text-center py-4 mt-3">
                                    <button class="btn btn-cyan" type="submit">CONNEXION</button>
                                </div>

                            </form>
                            <!-- Material form register -->

                        </div>
                        <!-- Card body -->

                    </div>
                    <!-- Card -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->

    <div class="modal fade" id="toto" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle12"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <!-- Card -->
                    <div class="card">

                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Material form register -->
                            <form action="postDeconnexion.php" method="POST">
                                <p class="h4 text-center py-4">DECONNEXION</p>
                                    <div class="text-center py-4 mt-3">
                                        <p>Etes vous sur de vouloir vous déconnecter ?</p>
                                        <button class="btn btn-blue" class="dropdown-item" href="postDeconnexion"  type="submit">OK</button>
                                    </div>
                            </form>
                            <!-- Material form register -->

                        </div>
                        <!-- Card body -->

                    </div>
                    <!-- Card -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


</header>
</html>
