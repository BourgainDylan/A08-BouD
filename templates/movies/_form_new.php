
<form class="w-25" action="index.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputPassword1">Nom</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="nom" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">date</label>
    <input type="text" name="release_date" class="form-control" id="exampleInputPassword1" placeholder="release_date" required>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">realisateur</label>
    <input type="text" name="director" class="form-control" id="exampleInputPassword1" placeholder="director" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">durée</label>
    <input type="text" name="duration" class="form-control" id="exampleInputPassword1" placeholder="duration" required>
  </div>

 
  <div class="form-group d-flex flex-row ml-3">
                <label for="phase" name="phase" class="mr-2">Phase</label>

                <select class="form-control" name="phase">
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                </select>
            </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Affiche</label>
    <input name="image" type="file"  accept="image/png, image/jpeg" class="form-control-file" id="exampleFormControlFile1">
  </div>
 

  <button type="submit" name="formNew"  value="none" class="btn btn-primary">Enregistrer</button>

 
</form>