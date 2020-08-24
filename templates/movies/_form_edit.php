<?php
            $sql = $db ->prepare("SELECT * FROM movies where movies.id =$edit");
            $sql -> execute();
            $editer = $sql -> fetchAll(PDO::FETCH_ASSOC);


?>


<form action="index.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputPassword1">Nom</label>
    <input type="text" name="Newname" <?php  echo' value="'.$editer[0]['name'].' " '; ?> class="form-control" id="exampleInputPassword1" placeholder="nom" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">date</label>
    <input type="text"   name="NewDate" <?php  echo' value="'.$editer[0]['release_date'].' " '; ?> name="release_date" class="form-control" id="exampleInputPassword1" placeholder="release_date" required>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">realisateur</label>
    <input type="text"   name="NewDirector"  <?php  echo' value="'.$editer[0]['director'].' " '; ?> name="director" class="form-control" id="exampleInputPassword1" placeholder="director" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">durée</label>
    <input type="text"  name="NewDuration"  <?php  echo' value="'.$editer[0]['duration'].' " '; ?>  name="duration" class="form-control" id="exampleInputPassword1" placeholder="duration" required>
  </div>

 

  <div class="form-group">
    <label for="exampleInputPassword1">phase</label>
    <input type="text"  name="NewId_phase"  <?php  echo' value="'.$editer[0]['id_phase'].' " '; ?>  name="phase" class="form-control" id="exampleInputPassword1" placeholder="phase" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Affiche</label>
    <input name="image"  type="file" value="" accept="image/png, image/jpeg" class="form-control-file" id="exampleFormControlFile1">
  </div>
 
 

  <input type="submit" name="editMovie" class="btn btn-warning"value="Modifier">
<?php
  echo'<input type="hidden" value="'.$_GET['edit'].'" name="id">';
?>
 
</form>