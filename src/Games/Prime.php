<?php

namespace BrainGames\Engine;

class GamePrime extends GameBase
{
    public function getGameTitle()
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    public function getQuestion()
    {
        $number = rand(0, 1000);
        return "Question: {$number}";
    }

    public function getCorrectAnsver($question)
    {
        $aQuestion = explode(" ", $question);
        $number = $aQuestion[1];
        $sqrtNumber = sqrt($number);
        for ($i = 2; $i < $sqrtNumber; $i++) {
            if ($number % $i === 0) {
                return 'no';
            }
        }
        return 'yes';
    }

    public function isAnsverValid($ansver)
    {
        $ansvers = ["no" , "yes"];
        return in_array($ansver, $ansvers);
    }
}
