<?php

$requestActorsList = $db -> prepare("SELECT actors.last_name, actors.id, actors.first_name, actors.dob, actors.image FROM actors ORDER BY actors.dob ASC");
$requestActorsList -> execute();
$listActors = $requestActorsList -> fetchALL(PDO::FETCH_ASSOC);

echo'<div class="container text-center ">';
echo'<div class="row d-flex justify-content-center"">';


$i=0;
        foreach($listActors as $key){

        echo'<div class="p-1 text-secondary">';
        echo'<h3 class="p-2 bg-light w-20"> '.$listActors[$i]['last_name'].' </h3>';
        echo'<h3 class="p-2 bg-light w-20"> '.$listActors[$i]['first_name'].' </h3>';
        echo' <a href="index.php?IDactors='.$listActors[$i]['id'].'"> <img class="img-fluid" name="show" class="p-2" src="./uploads_actors/'.$listActors[$i]['image'].'"></a>';
        echo'</div>';
        $i++;

        }



echo'</div>';
echo'</div>';



?>