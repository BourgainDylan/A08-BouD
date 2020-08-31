<?php include_once './settings/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once './templates/head.html'; ?>

<body>

    <?php include_once './templates/header.html'; ?>
    <div class="d-flex justify-content-arround">
        <?php include_once './templates/nav.html'; ?>

        <section class="col-sm-10">

            <?php


              
        if(isset($_GET["addmovie"])) {

            include_once './templates/movies/_form_new.php';

              
            }


        if(isset($_GET['accueil'])){

            echo' <h1 class="d-flex justify-content-center">Bienvenue !</h1>';

        }

        if(isset($_GET['list'])){
            include_once './templates/movies/list.php';
            

        }

        if(isset($_POST['formNew'])){
                
            $movieName = $_POST['name'];
            $movieDate = $_POST['release_date'];
            $movieDuration = $_POST['duration'];
            $movieRealisateur= $_POST['director'];
            $moviePhase = $_POST['phase'];
            $movieImg = $_FILES['image']['name'];



            move_uploaded_file($_FILES['image']['tmp_name'], "./uploads_movies/".$movieImg);
            $sql = ("INSERT INTO movies (name, release_date, duration, director, id_phase, image )
                    VALUES ('$movieName', '$movieDate', '$movieDuration', '$movieRealisateur', '$moviePhase' ,'$movieImg')");

            $db->exec($sql);
            echo'<div class="alert alert-success" role="alert">';
            echo'le film a bien été enregistré dans la bdd';
            echo'</div>';
             
                
        }

        if(isset ($_GET['id'])){

            include_once './templates/movies/show.php';
           
        }
            



        if(isset($_GET["delete"])){


            $delete = $_GET["delete"];
            $sql= "DELETE FROM `movies` WHERE `movies`.`id` = $delete";
            $db->exec($sql);
            echo'<div class="alert alert-success" role="alert">';
            echo'le film a bien été supprimé';
            echo'</div>';


        }


        if(isset($_GET['edit'])){

            $edit = $_GET['edit'];
            include_once './templates/movies/_form_edit.php';

        }
         
        if(isset($_POST['editMovie'])){
            
         
         
            $filmiD = $_POST['id'];
            
            $NewMovieName = $_POST['Newname'];
            $NewDate = $_POST['NewDate'];
            $NewDirector = $_POST['NewDirector'];
            $NewDuration = $_POST['NewDuration'];
            $NewId_phase = $_POST['NewId_phase'];
            $movieImg = $_FILES['image']['name'];
      

            if(!empty($movieImg)){
          
                $EditSQL = $db ->prepare("UPDATE `movies`
                SET `name`='$NewMovieName',
                    `id_phase`='$NewId_phase' ,
                    `release_date`='$NewDate',
                    `director`='$NewDirector' , 
                    `duration`='$NewDuration' ,
                    `image` ='$movieImg'
                WHERE `movies`.`id` = $filmiD");

             
        }
            else{
           
                $EditSQL = $db ->prepare("UPDATE `movies`
                SET `name`='$NewMovieName',
                    `id_phase`='$NewId_phase' ,
                    `release_date`='$NewDate',
                    `director`='$NewDirector' , 
                    `duration`='$NewDuration' 
                WHERE `movies`.`id` = $filmiD");

                }

          
            $EditSQL -> execute();

            echo'<div class="alert alert-success" role="alert">';
            echo'le film a bien été modifié';
            echo'</div>';
        }
    
            
        if(isset($_GET['q'])){
   
            include_once './templates/movies/search.php';

        }

        if(isset($_GET['addActors'])){
              
            $sql = $db->prepare("SELECT movies.name FROM movies");
            $sql -> execute();
            $filmCollections = $sql -> fetchAll(PDO::FETCH_ASSOC);
            include_once './templates/movies/_form_new_actors.php';

        }

        if(isset($_POST['formNewActors'])){

            $movies_name = $_POST['filmIdcollecton'];
            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $actors_Dob = $_POST['Dob'];
            $actors_image = $_FILES['Actorimage']['name'];
            move_uploaded_file($_FILES['Actorimage']['tmp_name'], "./uploads_actors/".$actors_image);
          
                
            $sql = ("INSERT INTO actors (last_name,first_name, dob,image)
            VALUES ('$last_name', '$first_name', '$actors_Dob','$actors_image')");
            $db->exec($sql);


            //ON RECCUPERE L'ID MOVIE DANS LA BDD

            

            $sql = $db->prepare(" SELECT movies.id
            FROM movies
            WHERE movies.name= '$movies_name'");

            $sql -> execute();
            $r1 = $sql -> fetchAll(PDO::FETCH_ASSOC);
            
            var_dump( $r1);
           

            foreach($r1 as $i => $value){
              $id_movies = $r1[$i]['id'];

            }

            
            //ON RECCUPERE L'ID ACTEUR DANS LA BDD


            $sql = $db->prepare(" SELECT actors.id 
            FROM actors 
            WHERE actors.last_name =  '$last_name'");
     
            $sql -> execute();
            $r2 = $sql -> fetchAll(PDO::FETCH_ASSOC);
     

            foreach($r2 as $i => $value){
              $idActors = $r2[$i]['id'];

            }


            
            $sql = ("INSERT INTO actors_movies (id_actors ,id_movies, role)
            VALUES ('$idActors', '$id_movies', '$actors_role')");
            $db->exec($sql);
            echo'<div class="alert alert-success" role="alert">';
            echo'Acteur enregistré dans la bdd';
            echo'</div>';

          }
 

        if(isset($_GET['listActors'])){

            include_once './templates/movies/list_actors.php';
            

        }


        if(isset($_GET['IDactors'])){
          
         
            include_once './templates/movies/show_actors.php';
           

        }

        if(isset($_GET['IdActorsDel'])){



            $IdActorsDel = $_GET["IdActorsDel"];
              
      
          }




          
        if(isset ($_GET['EditActors'] )){

            $EditActors = $_GET['EditActors'];
            include_once './templates/movies/_form_edit_actors.php';

        };


        if(isset ($_POST['editActorsButton'])){

          $editactorsID = $_POST['editactorsvalue'];
          $NewFirstName = $_POST['NewfirstnameActor'];
          $NewLastName = $_POST['NewsurnameActor'];
          $NewDoB = $_POST['NewDob'];
          $ActorsImg = $_FILES['NewActorimage']['name'];
    
            if(!empty($ActorsImg)){
          
                    $EditSQL = $db ->prepare("UPDATE `actors`
                    SET `first_name`='$NewFirstName',
                        `last_name`='$NewLastName' ,
                        `dob`='$NewDoB',
                        `image` ='$ActorsImg'

                    WHERE `actors`.`id` = $editactorsID");
                    
            }else{
           
                    $EditSQL = $db ->prepare("UPDATE `actors`
                    SET `first_name`='$NewFirstName',
                        `last_name`='$NewLastName' ,
                         `dob`='$NewDoB'
                        WHERE `actors`.`id` = $editactorsID");
            }

          $EditSQL -> execute();

          echo'<div class="alert alert-success" role="alert">';
          echo'Acteur a bien été modifié';
          echo'</div>';
            
        }

        if(isset($_GET['supprimer'])){

            $delActors = $_GET["supprimer"];  
            $sql= " DELETE FROM actors WHERE actors.id = $delActors";
            $db->exec($sql);
            echo'<div class="alert alert-success" role="alert">';
            echo'le film a bien été supprimé';
            echo'</div>';
      }
      

            ?>


    </section>
    </div>
    <?php include_once './templates/footer.html'; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>