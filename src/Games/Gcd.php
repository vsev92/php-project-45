<?php

namespace BrainGames\Games\Gcd;

use  function BrainGames\Engine\playBrainGame as playBrainGame;

function runGame()
{
    playBrainGame('BrainGames\Games\Gcd\getGameTitle', 'BrainGames\Games\Gcd\getQuestAndAnswer');
}

function getGameTitle()
{
    return 'Find the greatest common divisor of given numbers.';
}

const RAND_MIN_VALUE = 1;
const RAND_MAX_VALUE = 100;

function getGcD(int $number1, int $number2)
{
    while ($number1 !== 0 && $number2 !== 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }
    return ($number1 + $number2);
}

function getQuestAndAnswer()
{
    $questAndAnsw = [];
    $number1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $number2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $questAndAnsw['question'] = "Question: {$number1} {$number2}";
    $questAndAnsw['answer'] = (string)getGcD($number1, $number2);
    return $questAndAnsw;
}
