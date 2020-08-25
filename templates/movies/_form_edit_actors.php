<?php
            $sql = $db ->prepare("SELECT * FROM actors WHERE actors.id =$EditActors");
            $sql -> execute();
            $editactorsform = $sql -> fetchAll(PDO::FETCH_ASSOC);

            var_dump($editactorsform);
?>

<form class="w-25" action="index.php" method="POST" enctype="multipart/form-data">
    <div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nom</label>
            <input type="text" <?php  echo' value="'.$editactorsform[0]['first_name'].' " '; ?> name="NewfirstnameActor" class="form-control" id="exampleInputPassword1" placeholder="Insérez nom"
                required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Prénoms</label>
            <input type="text" <?php  echo' value="'.$editactorsform[0]['last_name'].' " '; ?> name="NewsurnameActor" class="form-control" id="exampleInputPassword1"
                placeholder="insérez prénom" required>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Rôle</label>
            <input type="text" name="NewroleActors" class="form-control" id="exampleInputPassword1" placeholder="inserez role"
                required>
        </div>

        <input type="date" name="NewDob" value="2018-07-22">
    </div>


    <div class="form-group">
        <label for="exampleFormControlFile1">Affiche</label>
        <input name="NewActorimage" type="file" accept="image/png, image/jpeg" class="form-control-file"
            id="exampleFormControlFile1">
    </div>

    
  <input type="submit" name="editActorsButton" class="btn btn-warning"value="Modifier">
<?php
  echo'<input type="hidden" value="'.$_GET['EditActors'].'" name="editactorsvalue">';
?>



</form>