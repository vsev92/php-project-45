<?php

namespace BrainGames\Games\Gcd;

function getGameTitle(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function getQuestion(): string
{
    $number1 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    $number2 = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    return "Question: {$number1} {$number2}";
}

function getGcD($number1, $number2): int
{
    while ($number1 != 0 && $number2 != 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }
    return ($number1 + $number2);
}

function getCorrectAnswer($question): string
{
    $aQuestion = explode(" ", $question);
    $number1 = (int)$aQuestion[1];
    $number2 = (int)$aQuestion[2];
    return (string)getGcD($number1, $number2);
}

function getQuestionsForGame(): array
{
    $questions = [];
    for ($i = 0; $i < 3; $i++) {
        $questions[] = getQuestion();
    }
    return $questions;
}

function getCorrectAnswersForGame($questions): array
{
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $answers[] = getCorrectAnswer($questions[$i]);
    }
    return $answers;
}
