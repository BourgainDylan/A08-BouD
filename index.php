<?php include_once './settings/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once './templates/head.html'; ?>

<body>

  <?php include_once './templates/header.html'; ?>
  <div class="d-flex justify-content-arround">
    <?php include_once './templates/nav.html'; ?>

    <section class="col-sm-9">
   
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



                move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/".$movieImg);
          
                
               
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


            ?>
         
    </section>
  </div>
  <?php include_once './templates/footer.html'; ?>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>