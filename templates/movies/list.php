<?php

$sql = $db ->prepare("SELECT movies.image, movies.id FROM movies");
$sql -> execute();
$table = $sql -> fetchAll(PDO::FETCH_ASSOC);

echo'<divd-flex class="justify-content-end w-50">'; 


$i = 0;

foreach ($table as $row){

echo' <a href="index.php?id='.$row['id'].'"> <img name="show" class="p-2" src="./uploads/'.$row['image'].'"></a>';
 
$i++;

 }
 

echo'<div>';
echo'<a href="index.php?addmovie"> <button  value="none" class="btn btn-primary">ajouter un nouveau film</button></a>';
echo'</div>';



?>
