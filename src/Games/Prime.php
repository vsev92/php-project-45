<?php

namespace BrainGames\Games\Prime;

function getGameTitle()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 1000;

function getQuestion()
{
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    return "Question: {$number}";
}

function isPrime(int $number)
{
    $sqrtNumber = sqrt($number);
    for ($i = 2; $i < $sqrtNumber; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function getCorrectAnswer(string $question)
{
    $aQuestion = explode(" ", $question);
    $number = (int)$aQuestion[1];
    return isPrime($number) ? 'yes' : 'no';
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
