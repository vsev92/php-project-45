<?php

namespace BrainGames\Games\Calc;

function getGameTitle()
{
    return 'What is the result of the expression?';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function getQuestion()
{
    $operators = ['+', '-', '*'];
    $operand1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operand2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $operator = $operators[rand(0, (count($operators) - 1))];
    return "Question: {$operand1} {$operator} {$operand2}";
}

function calculate(int $operand1, int $operand2, string $operator)
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
            break;
        case '*':
            return $operand1 * $operand2;
            break;
        case '-':
            return $operand1 - $operand2;
            break;
    }
}

function getCorrectAnswer(string $question)
{
    $aQuestion = explode(" ", $question);
    $operand1 = $aQuestion[1];
    $operator = $aQuestion[2];
    $operand2 = $aQuestion[3];
    return (string)calculate($operand1, $operand2, $operator);
}

function getQuestionsForGame()
{
    $questions = [];
    for ($i = 0; $i < 3; $i++) {
        $questions[] = getQuestion();
    }
    return $questions;
}

function getCorrectAnswersForGame(array $questions)
{
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $answers[] = getCorrectAnswer($questions[$i]);
    }
    return $answers;
}
