<?php

namespace BrainGames\Games\Prime;

use  function BrainGames\Engine\playBrainGame as playBrainGame;

function runGame()
{
    playBrainGame(getGameTitle(), 'BrainGames\Games\Prime\getQuestAndAnswer');
}

function getGameTitle()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 1000;


function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function getQuestAndAnswer()
{
    $questAndAnsw = [];
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $questAndAnsw['question'] = "Question: {$number}";
    $questAndAnsw['answer'] = isPrime($number) ? 'yes' : 'no';
    return $questAndAnsw;
}
