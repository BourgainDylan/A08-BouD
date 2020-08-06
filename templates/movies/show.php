<!-- show -->
<?php

$movieID = $_GET['id'];




$sql = "SELECT * FROM movies JOIN phases ON id_phase = phases.id WHERE movies.id = $movieID";
$sql = $db->query($sql);
$tableaufilm = $sql -> fetch(PDO::FETCH_ASSOC);




echo'<div>';
echo'<h2> '.$tableaufilm['name'].'</h2>'; 
echo'<img src="./uploads/'.$tableaufilm['image'].'.jpg" />';
echo'<div>';
echo'<p> Durée : '.$tableaufilm['duration'].'</p>';
echo'<p> Date de sortie : '.$tableaufilm['release_date'].'</p>';
echo'<p> Realisateur :'.$tableaufilm['director'].'</p>';
echo'<p> Phase:'.$tableaufilm['id_phase'].'</p>';
echo'</div>';


echo'<div>';


echo'<a  href="index.php?edit='.$movieID.'"> <button type="button" class="btn btn-warning">Editer</button></a>';

echo'<a  href="index.php?delete='.$movieID.'"> <button  type="button" class="btn btn-danger">Supprimer</button></a>';


echo'</div>';





?>