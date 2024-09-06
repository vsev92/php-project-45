<?php

namespace BrainGames\Games\Even;

use  function BrainGames\Engine\playBrainGame as playBrainGame;

function runGame()
{
    playBrainGame('BrainGames\Games\Even\getGameTitle', 'BrainGames\Games\Even\getQuestAndAnswer');
}

function getGameTitle()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function getQuestAndAnswer()
{
    $questAndAnsw = [];
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $questAndAnsw['question'] = "Question: {$number}";
    $questAndAnsw['answer'] = isEven($number) ?  'yes' : 'no';
    return $questAndAnsw;
}
