<?php

$sql = $db ->prepare("SELECT movies.image, movies.id, movies.name FROM movies ORDER BY movies.release_date ASC");
$sql -> execute();
$table = $sql -> fetchAll(PDO::FETCH_ASSOC);

echo'<div class="row w-100 d-flex justify-content-center text-center">'; 




foreach ($table as $row){

    echo '<div class="col-4">';
    echo' <h4>'.$row['name'].' </h4>'; 
    echo' <a href="index.php?id='.$row['id'].'"> <img class="img-fluid" name="show" class="p-2" src="./uploads/'.$row['image'].'"></a>';
    echo '</div>';

 }
 
echo'</div>';


echo'<div>';
echo'<a href="index.php?addmovie"> <button  value="none" class="btn btn-primary">ajouter un nouveau film</button></a>';
echo'<div>';

?>
