<?php

// essaye de faire ça 

$host= "localhost";
$dbname = "a08_boud";
$login = "a08_boud";
$mdp = "mdp";


try{
$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8',$login, $mdp);
}

// si il y a une erreur tu fais ça 

catch(Exception $e){
    die("erreur:".$e->getMessage());
}