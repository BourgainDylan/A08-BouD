<!-- search -->

<?php
if(isset($_GET['q'])){
    $q= htmlspecialchars($_GET['q']);

    $sql = $db ->prepare("SELECT movies.name FROM movies");
    $sql -> execute();
    $search = $sql -> fetchAll(PDO::FETCH_ASSOC);
    
var_export($search);
    
}


?>