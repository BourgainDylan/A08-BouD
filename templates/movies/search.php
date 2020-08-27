<!-- search -->

<?php

   
    $q = $_GET['q'];
    
    $sql = $db ->prepare("SELECT movies.image, movies.name, movies.id FROM movies WHERE movies.name LIKE  '%$q%'  ");
    $sql -> execute();
    $tableMovie = $sql -> fetchAll(PDO::FETCH_ASSOC);

echo' <div class=" d-flex align-items-center justify-content-around flex-wrap w-100">';
    if(!empty($tableMovie)){

        $i = 0;
        foreach($tableMovie as $key){

        echo' <div class="px-2">';
        echo' <h5> '.$tableMovie[$i]['name'].' </h5>';
   
        echo'<a href="index.php?id='.$key['id'].'"><img src="./uploads_movies/'.$tableMovie[$i]['image'].'" /></a>';
          echo'</div>';

        $i++;
        }


    }

    
    if(empty($tableMovie)){
        echo' <div class="alert alert-danger text-center" role="alert">';
    echo'Aucun film trouvé !';
        echo'</div>';
    }


    

   
$q = $_GET['q'];
    
$sql = $db ->prepare("SELECT actors.image, actors.first_name, actors.last_name, actors.id FROM actors WHERE actors.last_name LIKE  '%$q%'  ");
$sql -> execute();
$tableActors = $sql -> fetchAll(PDO::FETCH_ASSOC);


        if(!empty($tableActors)){

                $i = 0;
                foreach($tableActors as $key){

                    echo' <div class="px-2">';
                echo' <h5> '.$tableActors[$i]['first_name'].' '.$tableActors[$i]['last_name'].' </h5>';
                
                echo'<a href="index.php?idActors='.$key['id'].'"><img src="./uploads_actors/'.$tableActors[$i]['image'].'" /></a>';
                    echo'</div>';
                $i++;
                }

                    
              

        }

        if(empty($tableActors)){
            echo' <div class="alert alert-danger text-center" role="alert">';
        echo'Aucun Acteur trouvés !';
            echo'</div>';
        }

        echo' </div>';



?> 