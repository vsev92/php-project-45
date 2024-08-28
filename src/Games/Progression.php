<?php

namespace BrainGames\Games\Progression;

function getGameTitle(): string
{
    return 'What number is missing in the progression?';
}

const ELEMENT_MIN_VALUE = 0;
const ELEMENT_MAX_VALUE = 100;
const PROGRESSION_LENGHT_MIN_VALUE = 5;
const PROGRESSION_LENGHT_MAX_VALUE = 10;

function getQuestion(): string
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

function getProgression(): array
{
    $element = rand(ELEMENT_MIN_VALUE, ELEMENT_MAX_VALUE);
    $progressionLenght = rand(PROGRESSION_LENGHT_MIN_VALUE, PROGRESSION_LENGHT_MAX_VALUE);
    for (;;) {
        $difference = rand(-5, 5);
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

function getCorrectAnswer($question): string
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
                return $aQuestion[$i - 1] + $difference;
            } else {
                return $aQuestion[$i + 1] - $difference;
            }
        }
    }
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
