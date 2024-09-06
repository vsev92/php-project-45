<?php

namespace BrainGames\Games\Calc;

use  function BrainGames\Engine\playBrainGame as playBrainGame;

function runGame()
{
    playBrainGame('BrainGames\Games\Calc\getGameTitle', 'BrainGames\Games\Calc\getQuestAndAnswer');
}


function getGameTitle()
{
    return 'What is the result of the expression?';
}



function calculate(int $operand1, int $operand2, string $operator)
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '*':
            return $operand1 * $operand2;
        case '-':
            return $operand1 - $operand2;
        default:
            break;
    }
    return null;
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function getQuestAndAnswer()
{
    $questAndAnsw = [];
    $operators = ['+', '-', '*'];
    $operand1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operand2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operator = $operators[array_rand($operators)];
    $questAndAnsw['question'] = "Question: {$operand1} {$operator} {$operand2}";
    $questAndAnsw['answer'] = (string)calculate((int)$operand1, (int)$operand2, $operator);
    return $questAndAnsw;
}
