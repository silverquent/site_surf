<?php include('header.php'); ?>


<body>

<div class="pageAdmin  ">
    <div class="menuPageAdmin">

<?php include('menuAdmin.php')?>

<form action="postTatifs.php" method="post" enctype="multipart/form-data">
    <table id="tarifs" class="table table-bordered test  " >
        <thead class="thead bg-primary "


        <tr class="t">
            <th colspan="6" class="blue darken-4  titreTarifs" >Tarifs</th>

        </tr>
        <tr class="trTarifs">
            <th scope="col">Cours:</th>
            <th scope="col" colspan=2>Classique:</th>
            <th scope="col" colspan=2 >Confirmé</th>
            <th scope="col" >Formation vidéo</th>
        </tr>
        </thead>
        <tbody>
        <tr class=" blue lighten-1 "  >

            <th class="trTarifs">Type de cours :</th>
            <td >Collectif:</td>
            <td >Individiel :</td>
            <td >Collectif:</td>
            <td >Individiel :</td>
            <td >Internet :</td>
        </tr>
        <tr >
            <th class=" blue lighten-1 trTarifs" scope="row">Prix enfant :</th>
            <td> <input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
        </tr>
        <tr>
            <th class="blue lighten-1 trTarifs" scope="row">Prix adulte :</th>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
        </tr>
        <tr >
            <th  class="blue lighten-1 trTarifs" scope="row">Tarifs dégressif enfant :</th>
            <td><input type="text" id="exampleForm2" class="form-control"> </td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>

        </tr>
        <tr>
            <th class="blue lighten-1 trTarifs"  scope="row">Tarifs dégressif adulte :</th>
            <td><input type="text" id="exampleForm2" class="form-control"> </td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>

        <tr>
            <th class="blue lighten-1 trTarifs"  scope="row">Durée de cours :</th>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
            <td><input type="text" id="exampleForm2" class="form-control"></td>
        </tr>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary">Primary</button>
    </div>
</div>
</form>


    </div>
</div>

</body>


<footer>
    <?php include('footer.php'); ?>
</footer>

