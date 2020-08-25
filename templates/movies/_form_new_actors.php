<form class="w-25" action="index.php" method="POST" enctype="multipart/form-data">
    <div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nom</label>
            <input type="text" name="nameActor" class="form-control" id="exampleInputPassword1" placeholder="Insérez nom"
                required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Prénoms</label>
            <input type="text" name="surnameActor" class="form-control" id="exampleInputPassword1"
                placeholder="insérez prénom" required>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Rôle</label>
            <input type="text" name="roleActors" class="form-control" id="exampleInputPassword1" placeholder="inserez role"
                required>
        </div>

        <input type="date" name="Dob" value="2018-07-22">
    </div>


    <div class="form-group">
        <label for="exampleFormControlFile1">Affiche</label>
        <input name="Actorimage" type="file" accept="image/png, image/jpeg" class="form-control-file"
            id="exampleFormControlFile1">
    </div>


    <div class="py-md-2">
        <button type="submit" name="formNewActors" value="none" class="btn btn-primary">Enregistrer</button>
    </div>

</form>