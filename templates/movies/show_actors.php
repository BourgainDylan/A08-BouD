    <?php
    $idActors = $_GET['IDactors'];

    $sql = "SELECT * FROM actors WHERE actors.id = $idActors";
    $sql = $db->query($sql);
    $actorsview = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $db->prepare(" SELECT movies.id, movies.name, movies.image

    FROM actors_movies
    JOIN actors
    ON actors.id = actors_movies.id_actors
    JOIN movies
    ON movies.id =  actors_movies.id_movies
    WHERE actors.id= $idActors");
    $sql->execute();
    $movieview2 = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $db->prepare(" SELECT actors_movies.role 
    FROM actors_movies
    JOIN actors
    ON actors.id = actors_movies.id_actors 
    WHERE actors.id = $idActors");

    $sql2->execute();
    $movieviewrole = $sql2->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="container">';
    echo ' <h2 class="p-2"> Prénom: ' . $actorsview[0]['last_name'] . ' </h2>';
    echo ' <h2 class="p-2"> Nom: ' . $actorsview[0]['first_name'] . ' </h2>';
    echo ' <h4 class="p-2"> Date de Naissance: ' . $actorsview[0]['dob'] . ' </h4>';
    echo '<img src="./uploads_actors/' . $actorsview[0]['image'] . '" />';
    echo '<h2>Film(s) joué(s):</h2>';

    foreach ($movieview2 as $value)
    {

        echo '<a class="p-2" href="index.php?id=' . $value['id'] . '"> <img src="./uploads_movies/' . $value['image'] . '"> </a>';
        echo '<h3 class="p-2"> ' . $value['name'] . '</h3>';

    }
    echo '</div>';

    echo '</div>';

    $IdActorsDel = $idActors;
    $IdActorsEdit = $idActors;

    echo '<div class="p-2 container  d-flex justify-content-around">';
    echo '<a href="index.php?listActors"><button  type="button" class="p-3  btn btn-info">Retour à la liste</button></a>';
    echo '<a href="index.php?EditActors=' . $IdActorsEdit . '"><button type="button" class="p-3 btn btn-primary">Modifier</button></a>';
    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalactors">supprimer</button>';
    echo '</div>';

    ?>

    <!-- Modal -->

    <div class="modal fade" id="modalactors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
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

                    <a href="index.php?supprimer=<?php echo '' . $IdActorsDel . ' '; ?> "> <button type="submit"
                            class="btn btn-primary">Supprimer</button></a>

                </div>
            </div>
        </div>
    </div>