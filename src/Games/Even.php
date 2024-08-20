<?php

namespace BrainGames\Engine;

class GameEven extends GameBase
{
    public function getGameTitle()
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestion()
    {
        $number = rand(0, 100);
        return "Question: {$number}";
    }

    public function getCorrectAnsver($question)
    {
        $aQuestion = explode(" ", $question);
        $number = $aQuestion[1];
        return ($number % 2 === 0) ?  'yes' : 'no';
    }
    public function isAnsverValid($ansver)
    {
        $ansvers = ["no" , "yes"];
        return in_array($ansver, $ansvers);
    }
}
