<?php

namespace BrainGames\Games\Gcd;

use  function BrainGames\Engine\playBrainGame;

const GAME_TITLE = 'Find the greatest common divisor of given numbers.';

function runGame()
{
    playBrainGame(GAME_TITLE, 'BrainGames\Games\Gcd\getQuestAndAnswer');
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
    $result = [];
    $number1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $number2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $result['question'] = "Question: {$number1} {$number2}";
    $result['answer'] = (string)getGcD($number1, $number2);
    return $result;
}
