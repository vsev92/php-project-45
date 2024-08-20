<?php

namespace BrainGames\Engine;

class GameGcd extends GameBase
{
    public function getGameTitle()
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    public function getQuestion()
    {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        return "Question: {$number1} {$number2}";
    }

    public function getCorrectAnsver($question)
    {
        $aQuestion = explode(" ", $question);
        $number1 = (int)$aQuestion[1];
        $number2 = (int)$aQuestion[2];

        while ($number1 != 0 && $number2 != 0) {
            if ($number1 > $number2) {
                $number1 = $number1 % $number2;
            } else {
                $number2 = $number2 % $number1;
            }
        }
        return ($number1 + $number2);
    }

    public function isAnsverValid($ansver)
    {
        return is_numeric($ansver);
    }
}
