<?php

$idActors = $_GET['IDactors'];


$sql = "SELECT * FROM actors WHERE actors.id = $idActors";
$sql = $db->query($sql);
$actorsview = $sql -> fetchAll(PDO::FETCH_ASSOC);

    
    echo' <div class="container">';
    
    echo' <h2> '.$actorsview[0]['last_name'].' </h2>';
    echo' <h2> '.$actorsview[0]['first_name'].' </h2>';
    echo' <h4> '.$actorsview[0]['dob'].' </h4>';
    echo'<img src="./uploads_actors/'.$actorsview[0]['image'].'" />';
    echo'</div>';


  $IdActorsDel=$idActors;
  $IdActorsEdit =$idActors ;


    echo'<div class="p-2 container  d-flex justify-content-around">';
    echo '<a href="index.php?listActors"><button  type="button" class="p-3  btn btn-info">Retour à la liste</button></a>';
    echo '<a href="index.php?EditActors='.$IdActorsEdit.'"><button type="button" class="p-3 btn btn-primary">Modifier</button></a>';
    echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalactors">supprimer</button>';

    
    echo'</div>';


?>


     <!-- Modal -->

     <div class="modal fade" id="modalactors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Suppression acteur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              êtes vous sûr de vouloir supprimer ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>


              <a  href="index.php?supprimer=<?php  echo''.$IdActorsDel.' '; ?> "> <button type="button" class="btn btn-primary">Supprimer</button></a>

            </div>
          </div>
        </div>
      </div>