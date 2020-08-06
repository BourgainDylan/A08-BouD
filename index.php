<?php include_once './settings/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once './templates/head.html'; ?>

    <body>

        <?php include_once './templates/header.html'; ?>
        <div class="d-flex justify-content-arround">
        <?php include_once './templates/nav.html'; ?>

        <section class="d-flex justify-content-center">
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

                   if(isset($_POST['name'])){
                
                $movieName = $_POST['name'];
                $movieDate = $_POST['release_date'];
                $movieDuration = $_POST['duration'];
                $movieRealisateur= $_POST['director'];
                $moviePhase = $_POST['phase'];
                $movieImg = $_FILES['image']['name'];



                move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/".$movieImg);
          
                
               
             $sql = ("INSERT INTO
                    movies (name, release_date, duration, director, id_phase, image )
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
              $sql = $db->query($sql);
              $supprimertable = $sql -> fetch(PDO::FETCH_ASSOC);
              
        

              echo'film supprimé';
             
          }

         



            ?>
        </section>
        </div>
        <?php include_once './templates/footer.html'; ?>

    </body>

</html>
