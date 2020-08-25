<!-- show -->
<?php

$movieID = $_GET['id'];


$sql = "SELECT * FROM movies JOIN phases ON id_phase = phases.id WHERE movies.id = $movieID";
$sql = $db->query($sql);
$tableaufilm = $sql -> fetch(PDO::FETCH_ASSOC);




echo'<h2> '.$tableaufilm['name'].'</h2>'; 
echo'<img src="./uploads_movies/'.$tableaufilm['image'].'" />';
echo'<div>';
echo'<p> Durée : '.$tableaufilm['duration'].'</p>';  
echo'<p> Date de sortie : '.$tableaufilm['release_date'].'</p>';
echo'<p> Realisateur :'.$tableaufilm['director'].'</p>';
echo'<p> Phase:'.$tableaufilm['id_phase'].'</p>';
echo'<div>';



$deleteMovie = $movieID;
$editMovie = $movieID;

echo'<a  href="index.php?edit='.$editMovie.'"> <button type="button" class="btn btn-warning">Editer</button></a>';
echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalmovie">supprimer</button>';



echo'</div>';


?>

     <!-- Modal -->

     <div class="modal fade" id="modalmovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Suppression film</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              êtes vous sûr de vouloir supprimer ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>


              <a  href="index.php?delete=<?php  echo''.$deleteMovie.' '; ?> "> <button type="button" class="btn btn-primary">Supprimer</button></a>

            </div>
          </div>
        </div>
      </div>