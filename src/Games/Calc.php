<?php

namespace BrainGames\Games\Calc;

use  function BrainGames\Engine\playBrainGame;

const GAME_TITLE = 'What is the result of the expression?';

function runGame()
{
    playBrainGame(GAME_TITLE, 'BrainGames\Games\Calc\getQuestAndAnswer');
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
            throw new Exception('Wrong operator');
    }
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function getQuestAndAnswer()
{
    $result = [];
    $operators = ['+', '-', '*'];
    $operand1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operand2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operator = $operators[array_rand($operators)];
    $result['question'] = "Question: {$operand1} {$operator} {$operand2}";
    $result['answer'] = (string)calculate($operand1, $operand2, $operator);
    return $result;
}
