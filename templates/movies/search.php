<!-- search -->

<?php

   
    $q = $_GET['q'];
    
    $sql = $db ->prepare("SELECT movies.image, movies.name, movies.id FROM movies WHERE movies.name LIKE  '%$q%'  ");
    $sql -> execute();
    $table = $sql -> fetchAll(PDO::FETCH_ASSOC);




    if(!empty($table)){

$i = 0;
foreach($table as $key){

echo' <h3> '.$table[$i]['name'].' </h3>';
echo'<a href="index.php?id='.$key['id'].'"><img src="./uploads_movies/'.$table[$i]['image'].'" /></a>';


$i++;
}

}

    if(empty($table)){
       echo' <div class="alert alert-secondary text-center" role="alert">';
      echo'Aucun film trouvé !';
       echo'</div>';
    }



?> 