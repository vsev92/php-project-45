<?php

namespace BrainGames\Games\Prime;

use  function BrainGames\Engine\playBrainGame;

const GAME_TITLE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runGame()
{
    playBrainGame(GAME_TITLE, 'BrainGames\Games\Prime\getQuestAndAnswer');
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
    $result = [];
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $result['question'] = "Question: {$number}";
    $result['answer'] = isPrime($number) ? 'yes' : 'no';
    return $result;
}
