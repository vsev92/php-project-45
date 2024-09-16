<?php

namespace BrainGames\Games\Progression;

use  function BrainGames\Engine\playBrainGame;

const GAME_TITLE = 'What number is missing in the progression?';

function runGame()
{
    playBrainGame(GAME_TITLE, 'BrainGames\Games\Progression\getQuestAndAnswer');
}

const ELEMENT_MIN_VALUE = 0;
const ELEMENT_MAX_VALUE = 100;
const PROGRESSION_LENGTH_MIN_VALUE = 5;
const PROGRESSION_LENGTH_MAX_VALUE = 10;
const PROGRESSION_STEPS = [-5, -4, -3, -2, -1 , 1, 2, 3, 4, 5];

function getProgression()
{
    $startElement = rand(ELEMENT_MIN_VALUE, ELEMENT_MAX_VALUE);
    $progressionLength = rand(PROGRESSION_LENGTH_MIN_VALUE, PROGRESSION_LENGTH_MAX_VALUE);
    $step = PROGRESSION_STEPS[array_rand(PROGRESSION_STEPS)];
    $endElement = $startElement + $step * ($progressionLength - 1);
    return range($startElement, $endElement, $step);
}


function getQuestAndAnswer()
{
    $result = [];
    $progression = getProgression();
    $progressionLength = count($progression);
    $hiddenElementPosition = rand(0, $progressionLength - 1);

    $result['answer'] = (string)$progression[$hiddenElementPosition];

    $progression[$hiddenElementPosition] = '..';
    $question = "Question:";
    foreach ($progression as $element) {
        $question = $question . ' ' . $element;
    }

    $result['question'] = $question;

    return $result;
}
