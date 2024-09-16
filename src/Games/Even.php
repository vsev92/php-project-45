<?php

namespace BrainGames\Games\Even;

use  function BrainGames\Engine\playBrainGame;

const GAME_TITLE = 'Answer "yes" if the number is even, otherwise answer "no".';

function runGame()
{
    playBrainGame(GAME_TITLE, 'BrainGames\Games\Even\getQuestAndAnswer');
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function getQuestAndAnswer()
{
    $result = [];
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $result['question'] = "Question: {$number}";
    $result['answer'] = isEven($number) ?  'yes' : 'no';
    return $result;
}
