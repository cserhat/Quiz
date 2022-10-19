<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Time | Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    </style>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

  </head>
  <body>
  <body>
<?php

    include 'Includes/header.php';
    require '../App//Core/Config/app.php';
    require '../App//Core/Database/database.php';

    use App\Database\Database as database;
    use App\Config\Config as config;
    $userscore = new App\Controllers\Score;
    $dbh = new database($conf);
    
    $questions = $dbh->requeteSelectRandom("question");
    $reponses = $dbh->requeteSelect("answer");
    $vrais = $dbh->requeteSelectPost('answer','answer-check','1');
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form id="regForm" action="" method="POST">
                <h1 id="register">Quiz Time</h1>
                <h1><?php
                     $quiz = $userscore->affiche();
                      echo '%';
                 ?></h1>
                <div class="all-steps" id="all-steps"> 
                   <span class="step">1</span>
                  <span class="step">2</span> 
                  <span class="step">3</span> 
                  <span class="step">4</span> 
                  <span class="step">5</span> 
                  <span class="step">6</span> 
                </div>
                <?php foreach($questions as $question){?>       
                <div class="tab">
                  <h6><?=$question['question']?></h6>
                    <p>
                        <select name="dd-<?=$question['id']?>">
                        <?php foreach($reponses as $reponse){?> 
                          <?php 

                          $question_id = $question['id'];
                          $reponse_id = $reponse['question-id'];
                          $answers = $reponse['answer'];

                          if($question_id == $reponse_id){
                        echo '<option value="'.$answers.'">'.$answers.'</option>' ;
                          }
                        ?>
                        
                        <?php 
                        }
                        ?>  
                      </select></p>
                  </div>      
                  <?php }
                     if(isset($_POST['envoyer'])){
                      if(count($vrais) > 0){
                        foreach($vrais as $vrai){                
                        $checkanswer = $_POST['dd-'.($vrai['question-id']).''];
                        $answer = $vrai['answer'];
                        $userscore->check($answer, $checkanswer);
                        
                        }
                      } 
                      header("Location: /quiz");
                      }
                      
                  ?>
                <div class="thanks-message text-center" id="text-message">
                    <input class="btn btn-success" name="envoyer" type="submit"></button>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> 
                      <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                    </div>
            </form>
        </div>
    </div>
</div>
  <?php include 'Includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
  </body>
</html>