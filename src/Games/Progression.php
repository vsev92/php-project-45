<?php

namespace BrainGames\Games\Progression;

function getGameTitle()
{
    return 'What number is missing in the progression?';
}



function getQuestion()
{
    $progression = getProgression();
    $progressionLenght = count($progression);
    $hidenElementPos = rand(0, $progressionLenght - 1);
    $progression[$hidenElementPos] = '..';
    $question = "Question:";
    foreach ($progression as $element) {
        $question = $question . ' ' . $element;
    }
    return $question;
}

const ELEMENT_MIN_VALUE = 0;
const ELEMENT_MAX_VALUE = 100;
const PROGRESSION_LENGHT_MIN_VALUE = 5;
const PROGRESSION_LENGHT_MAX_VALUE = 10;
const PROGRESSION_DIFFERENCE_MIN_VALUE = -5;
const PROGRESSION_DIFFERENCE_MAX_VALUE = 5;

function getProgression()
{
    $element = rand(ELEMENT_MIN_VALUE, ELEMENT_MAX_VALUE);
    $progressionLenght = rand(PROGRESSION_LENGHT_MIN_VALUE, PROGRESSION_LENGHT_MAX_VALUE);
    $difference = 0;
    for (;;) {
        $difference = rand(PROGRESSION_DIFFERENCE_MIN_VALUE, PROGRESSION_DIFFERENCE_MAX_VALUE);
        if ($difference !== 0) {
            break;
        }
    }
    $progression = [];
    for ($i = 0; $i < $progressionLenght; $i++) {
        $progression[] = $element;
        $element += $difference;
    }
    return $progression;
}

function getCorrectAnswer(string $question)
{
    $aQuestion = explode(" ", $question);
    $difference = 0;
    $aLen = count($aQuestion);
    for ($i = 2; $i < $aLen; $i++) {
        if (($aQuestion[$i] !== '..') && ($aQuestion[$i - 1] !== '..')) {
            $difference = (int)$aQuestion[$i] - (int)$aQuestion[$i - 1];
            break;
        }
    }
    for ($i = 1; $i < $aLen; $i++) {
        if ($aQuestion[$i] === '..') {
            if ($i === $aLen - 1) {
                return (string)(($aQuestion[$i - 1] + $difference));
            } else {
                return (string)(($aQuestion[$i + 1] - $difference));
            }
        }
    }
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
