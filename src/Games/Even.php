<?php

namespace BrainGames\Games\Even;

function getGameTitle()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

const RAND_MIN_VALUE = 0;
const RAND_MAX_VALUE = 100;

function getQuestion()
{
    $number = rand(RAND_MIN_VALUE, RAND_MAX_VALUE);
    return "Question: {$number}";
}

function isEven($number): bool
{
    return $number % 2 === 0;
}

function getCorrectAnswer($question)
{
    $aQuestion = explode(" ", $question);
    $number = $aQuestion[1];
    return isEven($number) ?  'yes' : 'no';
}

function getQuestionsForGame()
{
    $questions = [];
    for ($i = 0; $i < 3; $i++) {
        $questions[] = getQuestion();
    }
    return $questions;
}

function getCorrectAnswersForGame($questions)
{
    $answers = [];
    for ($i = 0; $i < 3; $i++) {
        $answers[] = getCorrectAnswer($questions[$i]);
    }
    return $answers;
}
