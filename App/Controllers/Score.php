<?php

namespace App\Controllers;

class Score
{
    private $userScore = 0;


    public function check($answer,$checkanswer){
        if($answer == $checkanswer)
        {
            $this->userScore++;
            $_SESSION['score'] = $this->userScore;
        }
    }

    
    public function affiche()
    {
        if(isset($_SESSION['score']))
        {
            $result = $_SESSION['score'] * 100 ;
            $resultfinal = $result / 24;
            echo intval($resultfinal);
        }
    }

}