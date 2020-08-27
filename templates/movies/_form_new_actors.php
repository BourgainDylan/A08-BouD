<form class="w-25" action="index.php" method="POST" enctype="multipart/form-data">
    <div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nom</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="Insérez nom"
                required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Prénoms</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputPassword1"
                placeholder="insérez prénom" required>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Rôle</label>
            <input type="text" name="roleActors" class="form-control" id="exampleInputPassword1" placeholder="inserez role"
                required>
        </div>

        <input type="date" name="Dob" value="2018-07-22">
    </div>

    
    <div class="form-group d-flex flex-row ml-3">
        <label for="phase" name="movieIdSelect" class="mr-2">Présent dans quel film ?</label>
    </div>

    <?php




$i=0;
   echo' <select class="form-control" name="filmIdcollecton">';
   foreach($filmCollections as $film){

   echo' <option name="filmIdcollecton" value="'.$filmCollections[$i]['name'].'">'.$filmCollections[$i]['name'].'</option>';
      $i++;
    
}
   echo' </select>';

   
    ?>
    




    <div class="form-group">
        <label for="exampleFormControlFile1">Affiche</label>
        <input name="Actorimage" type="file" accept="image/png, image/jpeg" class="form-control-file"
            id="exampleFormControlFile1">
    </div>


    <div class="py-md-2">
        <button type="submit" name="formNewActors" value="none" class="btn btn-primary">Enregistrer</button>
    </div>

</form>