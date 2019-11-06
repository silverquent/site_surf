<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Site je sais pas </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php   if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
      { ?> <li class="nav-item active">
      <a class="nav-link" href="index.php">Accueil</a>
      </li>
        <li class="nav-item active">
          <a class="nav-link" href="ajouter_video.php">Ajouter vidéo :</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="supprimer_video.php">Supprimer vidé :</a>
        </li>
      </li>   <?php }
      else { ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Accueil :</a>

      <?php } ?>

    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <?php
        if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
          { ?>  <li class="nav-item">
            <a class="nav-link" href="pagePerso.php"> <?php echo $_SESSION['pseudo']; ?> </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="post_deconnexion.php">Déconnexion :</a>
          </li>
        <?php }
        else { ?>
          <li class="nav-item">
            <a class="nav-link" href="connexion">Connexion :</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription">Inscription :</a>
          </li>
        <?php } ?>
        <a class="nav-link disabled" href="#"> </a>
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </nav>
